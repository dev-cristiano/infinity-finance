<?php

namespace App\Helpers;

class FormataValor
{
    public static function decimal($valor, $casasDecimais = 2)
    {
        $valor = str_replace(['.', ','], ['', '.'], $valor);
        return number_format((float)$valor, $casasDecimais, '.', '');
    }
}