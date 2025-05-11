<?php

namespace App\Http\Requests\Receitas;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0.01',
            'data_recebimento' => 'required|date|date_format:Y-m-d',
            'status' => 'required|string',
            'fonte_pagadora' => 'nullable|string',
            'metodo_recebimento' => 'nullable|string',
            'fixa' => 'boolean'
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'O usuário é obrigatório',
            'user_id.exists' => 'O usuário selecionado não existe',
            'descricao.required' => 'A descrição é obrigatória',
            'valor.required' => 'O valor é obrigatório',
            'valor.numeric' => 'O valor deve ser um número',
            'valor.min' => 'O valor deve ser maior que zero',
            'data_recebimento.required' => 'A data de recebimento é obrigatória',
            'data_recebimento.date' => 'Formato de data inválido',
            'status.required' => 'O status é obrigatório',
        ];
    }
}
