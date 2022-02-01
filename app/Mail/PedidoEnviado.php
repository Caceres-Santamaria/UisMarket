<?php

namespace App\Mail;

use App\Models\Pedido;
use App\Models\Tienda;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoEnviado extends Mailable
{
    use Queueable, SerializesModels;

    public $tienda;
    public $pedido;
    public $subject = 'Pedido enviado';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pedido,$tienda)
    {
        $this->pedido = $pedido;
        $this->tienda = $tienda;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.pedido-enviado');
    }
}
