<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserEnrollmentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Propriedades publicas são passadas automaticamente para a view
     * não precisam ser passadas como segundo parametro
     */
    public $user;
    public $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $event)
    {
        $this->user = $user;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //não precisa passar os dados para a view pq foram declarados como public
        //serão passados automaticamente pelo laravel
        return $this
        ->subject('Confirmação de inscrição')
        ->view('emails.enrollment-user');
    }
}
