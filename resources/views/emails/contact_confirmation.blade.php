<!DOCTYPE html>
<html>
<head>
    <title>Contact Confirmation</title>
</head>
<body>
    <h2>Hi {{ $contact->name }},</h2>
    <p>Thank you for reaching out to us regarding <strong>{{ $contact->service }}</strong>.</p>

    @if ($contact->message)
    <p><strong>Your message:</strong></p>
    <p>{{ $contact->message }}</p>
    @endif

    <p>We’ll get back to you soon!</p>
    <br>
    <p>Best regards,</p>
    <p>Your Company Name</p>
</body>
</html>
