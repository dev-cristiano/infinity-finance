<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use App\Services\CategoryService;

class DashboardController extends Controller
{
    public function index(DashboardService $dashboardService, CategoryService $categoryService)
    {
        $data = $dashboardService->getDataForUser(auth()->user());
        // dd($data);
        return view('dashboard', compact(
            'data'
        ));
    }
}
