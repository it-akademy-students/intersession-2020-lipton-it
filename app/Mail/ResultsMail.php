<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResultsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $path_progpilot_result = '../tmp/log/progpilot_result.md';
        $path_ecs_result = '../tmp/log/ecs_result.md';
        $path_phpcs_result = '../tmp/log/phpcs_result.md';

        if(file_exists($path_phpcs_result) &&
            file_exists($path_ecs_result) &&
            file_exists($path_progpilot_result)){
            return $this->markdown('emails.results')
            ->subject('Vos résultats sont là')
            ->attach($path_progpilot_result)
            ->attach($path_ecs_result)
            ->attach($path_phpcs_result);
        } else {
            return $this->markdown('emails.errMail')
            ->subject('Une erreur est survenue');
        }
    }
}
