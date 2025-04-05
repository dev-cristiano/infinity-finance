<?php

namespace App\Services;

use App\Models\Api\Category;
use App\Models\User;

class DashboardService
{
    public function getDataForUser(User $user): array
    {
        $expenses = $user->transactions()->where('type', 1)->sum('amount');
        $incomes = $user->transactions()->where('type', 2)->sum('amount');
        $total = $incomes - $expenses;

        $transactions = $user->transactions()->orderByDesc('id')->get();

        return compact(
            'expenses',
            'incomes',
            'total',
            'transactions'
        );
    }
}
