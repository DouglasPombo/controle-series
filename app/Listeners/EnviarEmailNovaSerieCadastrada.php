<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EnviarEmailNovaSerieCadastrada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        $nomeSerie = $event->nome;
        $qtd_temporadas = $event->qtd_temporadas;
        $ep_por_temporada = $event->ep_por_temporada;

        $users = User::all();

        foreach($users as $index => $user){
            $multiplicador = $index + 1;

            $email = New \App\Mail\NovaSerie(
                $nomeSerie,
                $qtd_temporadas,
                $ep_por_temporada
            );

            $email->subject = 'Nova Série Adicionada';
            $when = Carbon::now()->addSecond($multiplicador * 10);

            Mail::to($user)->later($when, $email);
        }
    }
}
