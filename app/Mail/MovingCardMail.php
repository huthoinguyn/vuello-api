<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MovingCardMail extends Mailable{

    use Queueable, SerializesModels;

    public $card;
    public $column;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($card, $column, $user){
        $this->card   = $card;
        $this->column = $column;
        $this->user   = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $subject = 'Card ' . $this->card->title . ' has been moved to ' . $this->column->name . ' column';

        return $this->subject($subject)->view('emails.moving-card');
    }
}
