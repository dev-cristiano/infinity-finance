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
     * Encontrar uma receita por ID
     * 
     * @param int $id
     * @return Receitas
     */
    public function findById(string $id);

    /**
     * Cria uma nova receita
     * 
     * @param array $data
     * return Receitas
     */

    public function create(array $data);

    /**
     * Atualiza uma receita existente

     * @param int $id
     * @param array $data
     * return Receitas
     */

    public function update(string $id, array $data);

    /**
     * Deletar uma receita
     * @param int $id
     * @return bool
     */

    public function delete(string $id);
}
