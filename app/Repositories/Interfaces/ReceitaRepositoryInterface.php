<?php

namespace App\Repositories\Interfaces;

use App\Models\Api\Receitas;

interface ReceitaRepositoryInterface
{
    /**
     * Obter todas as receitas
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * Encontrar uma receita pelo ID
     * 
     * @param string $id
     * @return Receitas
     */
    public function findById(string $id);

    /**
     * Criar uma nova receita
     * 
     * @param array $data
     * @return Receitas
     */
    public function create(array $data);

    /**
     * Atualizar uma receita existente
     * 
     * @param string $id
     * @param array $data
     * @return Receitas
     */
    public function update(string $id, array $data);

    /**
     * Deletar uma receita
     * 
     * @param string $id
     * @return bool
     */
    public function delete(string $id);
}
