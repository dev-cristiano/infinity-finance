<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->categories;

        return view('dashboard', compact('categories'));
    }
}
