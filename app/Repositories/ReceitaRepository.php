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
     * Construtor de injeção do modelo
     */

    public function __construct(Receitas $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Obter todas as receitas pelo ID
     * @param string $id
     * return Receitas
     */

    public function findById(string $id)
    {
        return $this->model->findById($id);
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
        $receita = $this->model->findById($id);
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
        $receita = $this->model->findById($id);
        return $receita->delete();
    }
}
