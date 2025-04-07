<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Alerta;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alertas = auth()->user()->alertas()->paginate(10);
        return view('alertas.index', compact('alertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alertas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if (!empty($data['data_alerta'])) {
            $data['data_alerta'] = Carbon::createFromFormat('d/m/Y', $data['data_alerta'])->format('Y-m-d');
        }

        if (!empty($data['data_alerta_final'])) {
            $data['data_alerta_final'] = Carbon::createFromFormat('d/m/Y', $data['data_alerta_final'])->format('Y-m-d');
        }

        // Substitui os valores no request com as datas convertidas
        $request->merge($data);

        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric|min:0.01',
            'data_alerta' => 'required|date',
            'data_alerta_final' => 'nullable|date',
            'alerta_recorrente' => 'boolean',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $alerta = Alerta::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'data_alerta' => $request->data_alerta,
            'data_alerta_final' => $request->data_alerta_final,
            'alerta_recorrente' => $request->alerta_recorrente ?? false,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('alertas.index')->with('success', 'Alerta criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alerta = Alerta::findOrFail($id);
        return view('alertas.edit', compact('alerta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Primeiro converte as datas para o formato correto
        $data = $request->all();

        if (!empty($data['data_alerta'])) {
            $data['data_alerta'] = Carbon::createFromFormat('d/m/Y', $data['data_alerta'])->format('Y-m-d');
        }

        if (!empty($data['data_alerta_final'])) {
            $data['data_alerta_final'] = Carbon::createFromFormat('d/m/Y', $data['data_alerta_final'])->format('Y-m-d');
        }

        $request->merge($data); // Substitui no request os valores já convertidos

        // Agora sim: valida com as datas em formato válido
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric|min:0.01',
            'data_alerta' => 'required|date',
            'data_alerta_final' => 'nullable|date',
            'alerta_recorrente' => 'boolean',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $alerta = Alerta::findOrFail($id);

        $alerta->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'data_alerta' => $request->data_alerta,
            'data_alerta_final' => $request->data_alerta_final,
            'alerta_recorrente' => $request->alerta_recorrente ?? false,
            'user_id' => $request->user_id,
            'updated_at' => now(),
        ]);

        return redirect()->route('alertas.index')->with('success', 'Alerta atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alerta = Alerta::findOrFail($id);
        $alerta->delete();
        return redirect()->route('alertas.index')->with('success', 'Alerta excluído com sucesso!');
    }
}
