<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Thank you for your booking, {{ $booking->full_name }}!</h1>
    <p>Here are your booking details:</p>

    <ul>
        <li>Vehicle ID: {{ $booking->vehicle_id }}</li>
<li>Vehicle Name: {{ $booking->vehicle ? $booking->vehicle->name : 'N/A' }}</li>
        <li>Service Type: {{ ucfirst($booking->service_type) }}</li>
        <li>Start: {{ $booking->start_date->format('F j, Y') }} at {{ $booking->start_time }}</li>
        <li>End: {{ $booking->end_date->format('F j, Y') }} at {{ $booking->end_time }}</li>
        <li>Pickup Location: {{ $booking->pickup_location }}</li>
        <li>Drop Location: {{ $booking->drop_location }}</li>
        @if($booking->service_type === 'hourly')
            <li>Hour Count: {{ $booking->hour_count }}</li>
        @endif
        <li>Message: {{ $booking->message ?: 'N/A' }}</li>
    </ul>

    <p>We will contact you shortly with more information.</p>

    <p>Best regards,<br>Your Company Name</p>
</body>
</html>
