<?php

namespace App\Services;

use App\Models\User;

class DashboardService
{
    public function getDataForUser(User $user): array
    {
        $receitas = $user->transactions()->where('type', 1)->sum('amount');
        $receitas = $user->transactions()->where('type', 2)->sum('amount');
        $total = $receitas - $receitas;

        $transactions = $user->transactions()->orderByDesc('id')->get();

        return compact(
            'receitas',
            'receitas',
            'total',
            'transactions'
        );
    }
}
