<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        /* Copy your exact CSS from the template above */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #fff;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #e5e5e5;
        }

        .header {
            padding: 40px 30px;
            text-align: center;
            border-bottom: 2px solid #2c5aa0;
        }

        .logo-section {
            margin-bottom: 25px;
        }

        .logo-placeholder {
            width: 150px;
            height: 60px;
            border: 1px solid #ccc;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #666;
            background: white;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #2c5aa0;
        }

        .header .subtitle {
            font-size: 16px;
            color: #666;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
            color: #333;
        }

        .confirmation-message {
            padding: 20px 0;
            margin: 25px 0;
            border-top: 1px solid #e5e5e5;
            border-bottom: 1px solid #e5e5e5;
        }

        .confirmation-message h2 {
            color: #2c5aa0;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .booking-details {
            margin: 30px 0;
        }

        .booking-details h3 {
            color: #333;
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .detail-item {
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .detail-value {
            color: #666;
            font-size: 15px;
        }

        .itinerary-note {
            margin: 25px 0;
            padding: 15px 0;
            border-top: 1px solid #e5e5e5;
        }

        .contact-section {
            margin: 30px 0;
            padding-top: 20px;
            border-top: 1px solid #e5e5e5;
        }

        .contact-section h4 {
            color: #2c5aa0;
            font-size: 16px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .footer {
            padding: 30px;
            text-align: center;
            border-top: 2px solid #2c5aa0;
        }

        .company-info {
            margin-bottom: 20px;
        }

        .company-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #2c5aa0;
        }

        .address {
            font-size: 14px;
            color: #666;
            line-height: 1.8;
        }

        .contact-details {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e5e5e5;
        }

        .contact-item {
            display: block;
            margin: 8px 0;
            font-size: 14px;
            color: #666;
        }

        .thank-you {
            font-size: 15px;
            margin-bottom: 20px;
            color: #333;
            font-style: italic;
        }

        .signature {
            margin-top: 40px;
            text-align: left;
        }

        .signature-name {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .signature-title {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .signature-company {
            color: #2c5aa0;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <div class="logo-section">
                <div class="logo-section">
                    <img src="{{ asset('assets/img/vacayguider.png') }}" alt="Vacay Guider Logo"
                        style="width:150px; height:auto; display:block; margin:0 auto;">
                </div>
            </div>
            <h1>VacayGuider</h1>
            <div class="subtitle">Ready For Adventure!</div>
        </div>

        <div class="content">
            <div class="greeting">
                Dear <span class="placeholder">{{ $booking->full_name }}</span>,
            </div>

            <div class="confirmation-message">
                <h2>Thank You!</h2>
                <p>
                    Your details have been submitted successfully. Our team has received your request for the
                    <strong>{{ $booking->package->heading ?? 'Selected Package' }}</strong>.
                    We will review the information and contact you shortly with the next steps.
                </p>
            </div>
            <div class="booking-details">
                <h3>Your Booking Details:</h3>

                <div class="detail-item">
                    <div class="detail-label">Package:</div>
                    <div class="detail-value">{{ $booking->package->heading ?? 'N/A' }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Travel Dates:</div>
                    <div class="detail-value">
                        {{ \Carbon\Carbon::parse($booking->start_date)->format('d M, Y') }} -
                        {{ \Carbon\Carbon::parse($booking->end_date)->format('d M, Y') }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Number of Travelers:</div>
                    <div class="detail-value">{{ $booking->adults + ($booking->children ?? 0) }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Hotel:</div>
                    <div class="detail-value">{{ $booking->hotel_type }}</div>
                </div>

                @if (!empty($booking->theme))
                    <div class="detail-item">
                        <div class="detail-label">Travel Themes:</div>
                        <div class="detail-value">{{ implode(', ', $booking->theme) }}</div>
                    </div>
                @endif

                <div class="detail-item">
                    <div class="detail-label">Package Price:</div>
                    <div class="detail-value">USD ${{ $booking->package->price ?? 'N/A' }}</div>
                </div>
            </div>


            <div class="itinerary-note">
                <p><strong>Detailed Itinerary:</strong> Below you will find the detailed schedule and itinerary
                    attached. We look forward to helping you create unforgettable memories.</p>
            </div>

            <div class="contact-section">
                <h4>Need Assistance?</h4>
                <p>For further information regarding anything at all, do not hesitate to contact us.</p>
            </div>


        </div>

        <div class="footer">
            <div class="company-info">
                <div class="company-name">VacayGuider</div>
                <div class="address">
                    <div>22/14C Asarappa Road.</div>
                    <div>Negombo, Sri Lanka</div>
                    <div>Sri Lanka</div>
                </div>
            </div>

            <div class="thank-you">
                "Thank you for choosing us for your travel needs"
            </div>

            <div class="contact-details">
                <div class="contact-item">Email: info@vacayguider.com</div>
                <div class="contact-item">Phone: +94 114 272 372</div>
                <div class="contact-item">Website: www.vacayguider.com</div>
            </div>
        </div>
    </div>
</body>

</html>
