<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailTeste extends Mailable
{
    use Queueable, SerializesModels;

    public $data = array();

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('email_teste');
        return $this->subject('Assunto do nosso e-mail')
                    ->view('email_teste');
    }
}
