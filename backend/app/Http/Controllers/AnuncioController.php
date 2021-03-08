<?php

namespace App\Http\Controllers;

use App\Services\AnuncioService;
use Exception;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    /**
     * @var anuncioService
     */
    protected $anuncioService;

    /**
     * AnuncioController Constructor
     *
     * @param AnuncioService $anuncioService
     *
     */
    public function __construct(AnuncioService $anuncioService)
    {
        $this->anuncioService = $anuncioService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->anuncioService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'titulo',
            'descricao',
            'valor',
            'foto',
            'cep',
            'cidade',
            'estado',
            'bairro',
            'logradouro',
            'numero',
            'latitude',
            'longitude',


        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->anuncioService->saveAnuncioData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->anuncioService->getById($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function edit($data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'titulo',
            'descricao',
            'valor',
            'foto',
            'cep',
            'cidade',
            'estado',
            'bairro',
            'logradouro',
            'numero',
            'latitude',
            'longitude',
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->anuncioService->updateAnuncio($data, $id);

        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->anuncioService->deleteById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
