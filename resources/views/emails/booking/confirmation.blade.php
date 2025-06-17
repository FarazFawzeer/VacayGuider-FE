@component('mail::message')
# Booking Confirmation

Hi {{ $booking->full_name }},

Thank you for your booking. Here are your details:

- **Package**: {{ $booking->package->heading ?? 'N/A' }}
- **Start Date**: {{ $booking->start_date }}
- **End Date**: {{ $booking->end_date }}
- **Adults**: {{ $booking->adults }}
- **Children**: {{ $booking->children }}
- **Infants**: {{ $booking->infants }}

We'll get in touch soon!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
