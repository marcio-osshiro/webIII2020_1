<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MensagemProfessor extends Mailable
{
    use Queueable, SerializesModels;
    public $professor;
    public $mensagem;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($professor, $mensagem)
    {
        //
        $this->professor = $professor;
        $this->mensagem = $mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('professor.mensagemProfessor',
        ['professor'=> $this->professor, 'mensagem'=>$this->mensagem]
      );
    }
}
