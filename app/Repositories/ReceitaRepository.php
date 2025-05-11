<?php

namespace App\Repositories;

use App\Models\Api\Receitas;
use App\Repositories\Interfaces\ReceitaRepositoryInterface;

class ReceitaRepository implements ReceitaRepositoryInterface
{
    /**
     * @var Receitas
     */
    protected $model;

    /**
     * Construtor com injeção do modelo
     */
    public function __construct(Receitas $model)
    {
        $this->model = $model;
    }

    /**
     * Obter todas as receitas
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Encontrar uma receita pelo ID
     * 
     * @param string $id
     * @return Receitas
     */
    public function findById(string $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Criar uma nova receita
     * 
     * @param array $data
     * @return Receitas
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Atualizar uma receita existente
     * 
     * @param string $id
     * @param array $data
     * @return Receitas
     */
    public function update(string $id, array $data)
    {
        $receita = $this->findById($id);
        $receita->update($data);
        return $receita;
    }

    /**
     * Deletar uma receita
     * 
     * @param string $id
     * @return bool
     */
    public function delete(string $id)
    {
        $receita = $this->findById($id);
        return $receita->delete();
    }
}
