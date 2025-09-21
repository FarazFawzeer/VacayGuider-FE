@component('mail::message')
# Booking Confirmation

Dear {{ $booking->full_name }},

Thank you for booking **{{ $booking->package->heading }}**.  
Your payment was successful.

**Booking Details:**
- Invoice ID: {{ $booking->invoice_id }}
- Transaction ID: {{ $booking->transaction_id }}
- Amount: {{ $booking->payable_amount }} {{ $booking->payable_currency }}
- Payment Method: {{ $booking->payment_scheme }} ({{ $booking->card_number }})

We look forward to serving you.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
