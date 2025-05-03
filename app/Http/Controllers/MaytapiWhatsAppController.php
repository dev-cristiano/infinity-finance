<?php

namespace App\Http\Controllers;

use App\Services\MaytapiWhatsAppService;
use Illuminate\Http\Request;

class MaytapiWhatsAppController extends Controller
{
    protected MaytapiWhatsAppService $whatsAppService;

    public function __construct(MaytapiWhatsAppService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'to' => 'required|string',
            'message' => 'required|string',
        ]);

        $enviado = $this->whatsAppService->sendMessage($validated['to'], $validated['message']);

        return response()->json([
            'success' => $enviado,
            'message' => $enviado ? 'Mensagem enviada com sucesso' : 'Erro ao enviar mensagem',
        ]);
    }
}
