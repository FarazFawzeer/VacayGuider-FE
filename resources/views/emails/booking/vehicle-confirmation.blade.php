@component('mail::message')
# Thank you, {{ $bookingData->full_name }}!

We received your vehicle bookingData request. Here are your details:

- **Vehicle**: {{ $bookingData->vehicle->make }} {{ $bookingData->vehicle->model }}
- **Country**: {{ $bookingData->country }}
- **Phone**: {{ $bookingData->phone }}
- **WhatsApp**: {{ $bookingData->whatsapp }}
- **Start Date**: {{ $bookingData->start_date->format('Y-m-d') }}
- **End Date**: {{ $bookingData->end_date->format('Y-m-d') }}
- **Message**: {{ $bookingData->message }}

We'll contact you shortly.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
