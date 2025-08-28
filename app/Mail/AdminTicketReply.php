<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminTicketReply extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $reply;

    public function __construct(Ticket $ticket, string $reply)
    {
        $this->ticket = $ticket;
        $this->reply = $reply;
    }

    public function build()
    {
        return $this->subject('📬 تم الرد على تذكرتك')
            ->view('emails.admin_ticket_reply')
            ->with([
                'ticket' => $this->ticket,
                'reply' => $this->reply
            ]);
    }
}
