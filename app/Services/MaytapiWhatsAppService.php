<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MaytapiWhatsAppService
{
    protected string $apiKey;
    protected string $url;

    public function __construct()
    {
        $this->apiKey = config('services.maytapi.key');
        $this->url = config('services.maytapi.url');
    }

    public function sendMessage(string $to, string $message): bool
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-maytapi-key' => $this->apiKey,
        ])->post($this->url, [
            'to_number' => $to,
            'type' => 'text',
            'message' => $message,
        ]);

        if ($response->successful()) {
            logger('Mensagem enviada com sucesso', $response->json());
            return true;
        } else {
            logger('Erro ao enviar mensagem', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
            return false;
        }
    }
}
