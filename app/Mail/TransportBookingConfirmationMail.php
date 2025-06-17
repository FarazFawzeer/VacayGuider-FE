<?php

namespace App\Mail;

use App\Models\TransportationBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransportBookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Create a new message instance.
     *
     * @param TransportationBooking $booking
     * @return void
     */
    public function __construct(TransportationBooking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Transportation Booking Confirmation')
                    ->view('emails.booking.transport_booking_confirmation')
                    ->with([
                        'booking' => $this->booking,
                    ]);
    }
}
