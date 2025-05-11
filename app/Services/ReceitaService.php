<?php

namespace App\Services;

use App\Models\Api\Receitas;
use App\Repositories\Interfaces\ReceitaRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ReceitaService
{
    /**
     * @var ReceitaRepositoryInterface
     */
    protected $receitaRepository;

    /**
     * Construtor com injeção de dependência do repositório
     * 
     * @param ReceitaRepositoryInterface $receitaRepository
     */
    public function __construct(ReceitaRepositoryInterface $receitaRepository)
    {
        $this->receitaRepository = $receitaRepository;
    }

    /**
     * Obter todas as receitas
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function getAllReceitas()
    {
        return $this->receitaRepository->getAll();
    }

    /**
     * Encontrar receita por id
     * 
     * @param string $id
     * @return Receitas 
     */

    public function getReceitaById(string $id)
    {
        return $this->receitaRepository->findById($id);
    }

    /**
     * Criar uma nova receita
     * 
     * @param array $data
     * @return Receitas
     */
    public function createReceita(array $data)
    {
        try {
            return $this->receitaRepository->create($data);
        } catch (\Exception $e) {
            Log::erro('Erro ao criar receita' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Atualizar uma receita existente
     * 
     * @param string $id
     * @param array $data
     * @return Receitas
     */
    public function updateReceita(string $id, array $data)
    {
        try {
            return $this->receitaRepository->update($id, $data);
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar receita: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Deletar uma receita
     * 
     * @param string $id
     * @return bool
     */

    public function deleteReceita(string $id)
    {
        $receita = $this->getReceitaById($id);
        return $receita->delete();
    }
}
