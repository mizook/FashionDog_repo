<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewStylist extends Mailable
{
    use Queueable, SerializesModels;

    public $datosUsuario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datosUsuario)
    {
        $this->datosUsuario = $datosUsuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcome')->with('datosUsuario',$this->datosUsuario);
    }
}
