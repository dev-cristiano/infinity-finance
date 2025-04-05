<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|in:1,2',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $transaction = Transaction::create([
            'title' => $request->title,
            'type' => $request->type,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Transação criada com sucesso!');
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
