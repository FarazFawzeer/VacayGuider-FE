<?php

namespace App\Mail;

use App\Models\PackageBooking;
use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $package;

    public function __construct(PackageBooking $booking)
    {
        $this->booking = $booking;
        $this->package = $booking->package; // Make sure your PackageBooking model has a relationship to Package
    }

    public function build()
    {
        return $this->subject('Your Booking Request Confirmation')
                    ->view('emails.booking-confirmation');
    }
}
