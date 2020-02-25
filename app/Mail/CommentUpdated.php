<?php

namespace App\Mail;

use App\Comment;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentUpdated extends Mailable {

    use Queueable, SerializesModels;

    public $comment;

    public function __construct (Comment $comment) {

        $this -> comment = $comment;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.comment.updated');
    }
}
