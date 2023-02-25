<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoPartisipante extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario)
    {
        //
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
       // return $this->usuario;
        return $this->from('no-reply@diarioprogramador.com', 'Sistema Automatizado de Envio de Notificaciones')->subject('Registro de un nuevo usuario')->view('email.nuevo-usuario', ['usuario' => $this->usuario]);
    }
}
