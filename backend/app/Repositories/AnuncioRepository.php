<?php

namespace App\Repositories;

use App\Models\Anuncio;

class AnuncioRepository
{
    /**
     * @var Anuncio
     */
    protected $anuncio;

    /**
     * AnuncioRepository constructor.
     *
     * @param Anuncio $anuncio
     */
    public function __construct(Anuncio $anuncio)
    {
        $this->anuncio = $anuncio;
    }

    /**
     * Get all posts.
     *
     * @return Anuncio $anuncio
     */
    public function getAll()
    {
        return $this->anuncio
            ->get();
    }

    /**
     * Get anuncio by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->anuncio
            ->where('id', $id)
            ->get();
    }

    /**
     * Save Anuncio
     *
     * @param $data
     * @return Anuncio
     */
    public function save($data)
    {
        $anuncio = new $this->anuncio;

        $anuncio->titulo = $data['titulo'];
        $anuncio->descricao = $data['descricao'];
        $anuncio->valor = $data['valor'];
        $anuncio->foto = $data['foto'];
        $anuncio->cidade = $data['cidade'];
        $anuncio->estado = $data['estado'];
        $anuncio->bairro = $data['bairro'];
        $anuncio->logradouro = $data['logradouro'];
        $anuncio->numero = $data['numero'];
        // $anuncio->latitude = $data['latitude'];
        // $anuncio->longitude = $data['longitude'];
        $anuncio->cep = $data['cep'];

        $anuncio->save();

        return $anuncio->fresh();
    }

    /**
     * Update Anuncio
     *
     * @param $data
     * @return Anuncio
     */
    public function update($data, $id)
    {

        $anuncio = $this->anuncio->find($id);

        $anuncio->titulo = $data['titulo'];
        $anuncio->descricao = $data['descricao'];
        $anuncio->valor = $data['valor'];
        $anuncio->foto = $data['foto'];
        $anuncio->cep = $data['cep'];
        $anuncio->cidade = $data['cidade'];
        $anuncio->estado = $data['estado'];
        $anuncio->bairro = $data['bairro'];
        $anuncio->logradouro = $data['logradouro'];
        $anuncio->numero = $data['numero'];
        $anuncio->latitude = $data['latitude'];
        $anuncio->longitude = $data['longitude'];

        $anuncio->update();

        return $anuncio;
    }

    /**
     * Update Anuncio
     *
     * @param $data
     * @return Anuncio
     */
    public function delete($id)
    {

        $anuncio = $this->anuncio->find($id);
        $anuncio->delete();

        return $anuncio;
    }
}
