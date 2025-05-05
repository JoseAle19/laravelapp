<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    /** El código de recuperación */
    public $code;

    /**
     * Crea una nueva instancia.
     *
     * @param  int|string  $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Construye el mensaje.
     */
    public function build()
    {
        return $this
            ->subject('Tu código de recuperación')
            ->markdown('emails.reset-code')
            ->with([
                'code' => $this->code,
            ]);
    }
}
