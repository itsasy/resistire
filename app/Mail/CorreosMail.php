<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CorreosMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $contrasena;

    public function __construct($usuario, $contrasena)
    {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }

    public function build()
    {
        return $this->from('alerta.peru.minsa@gmail.com')
            ->subject("Alerta Perú:  Credenciales")
            ->view('mail.mail-formato');
    }
}
