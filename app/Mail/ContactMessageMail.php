<?php

// app/Mail/ContactMessageMail.php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ContactMessage $contactMessage
    ) {
    }

    public function build()
    {
        return $this
            ->subject(
                'New Contact Message: ' .
                ($this->contactMessage->subject ?? 'Contact Us')
            )
            ->view('emails.contact-message');
    }
}
