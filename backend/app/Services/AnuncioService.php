<?php

namespace App\Services;

use App\Repositories\AnuncioRepository;
use App\Models\Anuncio;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class AnuncioService
{
    /**
     * @var $anuncioRepository
     */
    protected $anuncioRepository;

    /**
     * AnuncioService constructor.
     *
     * @param AnuncioRepository $anuncioRepository
     */
    public function __construct(AnuncioRepository $anuncioRepository)
    {
        $this->anuncioRepository = $anuncioRepository;
    }

    /**
     * Delete anuncio by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $anuncio = $this->anuncioRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete anuncio data');
        }

        DB::commit();

        return $anuncio;
    }

    /**
     * Get all anuncio.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->anuncioRepository->getAll();
    }

    /**
     * Get anuncio by id.
     *
     * @param $id
     * @return String
     */
    public function getById($id)
    {
        return $this->anuncioRepository->getById($id);
    }

    /**
     * Update anuncio data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function updateAnuncio($data, $id)
    {
        $validator = Validator::make($data, [
            'cidade' => 'bail|min:2',
            'bairro' => 'bail|max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $anuncio = $this->anuncioRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update anuncio data');
        }

        DB::commit();

        return $anuncio;
    }

    /**
     * Validate anuncio data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function saveAnuncioData($data)
    {
        /* $validator = Validator::make($data, [
            'bairro' => 'required',
            'cidade' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
       */
        $result = $this->anuncioRepository->save($data);

        return $result;
    }
}
