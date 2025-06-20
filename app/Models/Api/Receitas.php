<?php

namespace App\Models\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receitas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'descricao',
        'valor',
        'data_recebimento',
        'status',
        'fonte_pagadora',
        'metodo_recebimento',
        'fixa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFixaAttribute($value)
    {
       return $value ? 'Sim' : 'Não';
    }
}
