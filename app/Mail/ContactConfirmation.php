<?php

namespace App\Mail;

use App\Models\ContactInfor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(ContactInfor $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Thank you for contacting us')
                    ->view('emails.contact_confirmation');
    }
}
