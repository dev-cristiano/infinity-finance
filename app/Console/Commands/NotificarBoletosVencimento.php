<?php

namespace App\Console\Commands;

use App\Jobs\EnviarMensagemWhatsApp;
use App\Models\Api\Alerta;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotificarBoletosVencimento extends Command
{
    protected $signature = 'boletos:notificar-vencimento';
    protected $description = 'Notificar via WhatsApp os boletos que estão vencendo';

    public function handle()
    {
        $amanha = Carbon::tomorrow()->toDateString();

        $boletos = Alerta::where('data_alerta', $amanha);
        // dd($boletos);

        // foreach ($boletos as $boleto) {
        //     EnviarMensagemWhatsApp::dispatch($boleclsto->);
        // }
    }
}
