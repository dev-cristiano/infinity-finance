<?php

namespace App\Models\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;

    protected $table = 'alertas';

    protected $fillable = [
        'titulo',
        'descricao',
        'valor',
        'data_alerta',
        'data_alerta_final',
        'user_id',
        'recorrente',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function getDataAlertaAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function getDataAlertaFinalAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function getAlertaRecorrenteAttribute($value)
    {
        return $value ? 'Sim' : 'Não';
    }

    public function getValorAttribute($value)
    {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    public function getDataAtualStatusAttribute()
    {
        if ($this->data_alerta < date('Y-m-d')) {
            return 'Em Dia';
        } else if ($this->data_alerta === date('Y-m-d')) {
            return 'Hoje';
        } else if ($this->data_alerta > date('Y-m-d')) {
            return 'Atrasado';
        }
    }
}