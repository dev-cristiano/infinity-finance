<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Receitas\StoreReceitaRequest;
use App\Services\ReceitaService;

class ReceitaController extends Controller
{
    /**
     * @var ReceitaService
     */
    protected $receitaService;

    /**
     * Construtor com injeção de dependência
     * 
     * @param ReceitaService $receitaService
     */

    public function __construct(ReceitaService $receitaService)
    {
        $this->receitaService = $receitaService;
    }

    /**
     * Display a listing the resource.
     */
    public function index()
    {
        $receitas = $this->receitaService->getAllReceitas();
        return view('receitas.index', compact('receitas'));
    }

    /**
     * Show the form creating a new resource.
     */
    public function create()
    {
        return view('receitas.create');
    }

    /**
     * Store a newly create resource in storage
     */
    public function store(StoreReceitaRequest $request)
    {
        try {
            // Os dados já foram validados pelo Form Request
            $receita = $this->receitaService->createReceita($request->validated());

            return redirect()->route('receitas.index')
                ->with('success', 'Receita criada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao criar receita: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the specified resource
     */
    public function show(string $id)
    {
        try {
            $receita = $this->receitaService->getReceitaById($id);
            // return view('receita.show', compact('receita'));
            return $id;
        } catch (\Exception $e) {
            return redirect()->route('receitas.index')
                ->with('error', 'Receita não encontrada.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $receita = $this->receitaService->getReceitaById($id);
            return view('receitas.edit', compact('receita'));
        } catch (\Exception $e) {
            return redirect()->route('receitas.index')
                ->with('error', 'Receita não encontrada.');
        }
    }
}
