<?php

namespace App\Services;

use App\Models\Api\Receitas;
use App\Repositories\Interfaces\ReceitaRepositoryInterface;
use Illuminate\Support\Facades\Log;

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
     * Encontrar uma receita específica pelo ID
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
            // Aqui podemos adicionar qualquer lógica de negócio antes de criar a receita
            // Por exemplo, formatação de dados, cálculos, etc.

            return $this->receitaRepository->create($data);
        } catch (\Exception $e) {
            Log::error('Erro ao criar receita: ' . $e->getMessage());
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
            // Aqui podemos adicionar qualquer lógica de negócio antes de atualizar a receita

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
        try {
            // Aqui podemos adicionar lógica antes de excluir, como verificar dependências

            return $this->receitaRepository->delete($id);
        } catch (\Exception $e) {
            Log::error('Erro ao excluir receita: ' . $e->getMessage());
            throw $e;
        }
    }
}
