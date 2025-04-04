<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Trás todas as transações.
     */
    public function index()
    {
        $categories = auth()->user()->categories();
    }

    /**
     * Mostrar o formulário para criar uma nova transação.
     */
    public function create()
    {
        //
    }

    /**
     * Cria uma nova transação.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Transaction::create($validated);

        return redirect()->route('dashboard')->with('sucess', 'Transaction create success');
    }

    /**
     * Mostra uma transação específica.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Mostra o formulário para editar uma transação.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Atualiza uma transação específica.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove uma transação específica.
     */
    public function destroy(string $id)
    {
        //
    }
}
