<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PAYable Checkout</title>
      <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }

        .container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 3rem 2rem;
            text-align: center;
            max-width: 500px;
            width: 90%;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
        }

        .icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        .icon svg {
            width: 32px;
            height: 32px;
            fill: white;
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 0.75rem;
            letter-spacing: -0.025em;
        }

        .subtitle {
            color: #666;
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1.5rem;
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background: #f0f0f0;
            border-radius: 3px;
            overflow: hidden;
            margin: 1.5rem 0;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 3px;
            animation: progress 3s ease-in-out infinite;
        }

        .security-note {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: #666;
        }

        .noscript-warning {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
        }

        .noscript-warning h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .noscript-warning p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .noscript-warning .icon {
            background: rgba(255, 255, 255, 0.2);
            margin-bottom: 1rem;
        }

        .noscript-warning .icon svg {
            fill: white;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes progress {
            0% { width: 0%; }
            50% { width: 70%; }
            100% { width: 100%; }
        }

        @media (max-width: 480px) {
            .container {
                padding: 2rem 1.5rem;
            }
            
            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
    <script src="https://sandboxipgsdk.payable.lk/sdk/v4/payable-checkout.js"></script>
</head>
<body>
   <div class="container">
        <div class="icon">
            <svg viewBox="0 0 24 24">
                <path d="M20,8H4V6C4,3.79 5.79,2 8,2H16C18.21,2 20,3.79 20,6V8M20,8V18C20,20.21 18.21,22 16,22H8C5.79,22 4,20.21 4,18V8M12,13A2,2 0 0,1 10,11A2,2 0 0,1 12,9A2,2 0 0,1 14,11A2,2 0 0,1 12,13Z"/>
            </svg>
        </div>
        
        <h1>Redirecting to Payment</h1>
        <p class="subtitle">Please wait while we securely redirect you to our payment processor</p>
        
        <div class="spinner"></div>
        
        <div class="progress-bar">
            <div class="progress-fill"></div>
        </div>
        
    </div>

    <noscript>
        <div class="noscript-warning">
            <div class="icon">
                <svg viewBox="0 0 24 24">
                    <path d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                </svg>
            </div>
            <h2>JavaScript Required</h2>
            <p>JavaScript is required to complete your secure payment transaction.</p>
            <p>Please enable JavaScript in your browser settings and refresh this page to continue.</p>
            <p><strong>Need help?</strong> Contact our support team if you're experiencing technical difficulties.</p>
        </div>
    </noscript>

    <script>
        const paymentData = {

            returnUrl: "{{ $returnUrl }}",
            logoUrl: "{{ $logoUrl }}",
            merchantKey: "{{ $merchantKey }}",
            checkValue: "{{ $checkValue }}",
            orderDescription: "{{ $orderDescription }}",
            invoiceId: "{{ $invoiceId }}",
            customerFirstName: "{{ $booking->full_name }}",
            customerLastName: "{{ $booking->last_name }}", // Replace with real value
            customerMobilePhone: "{{ $booking->phone }}",
            customerEmail: "{{ $booking->email }}",
            billingAddressStreet: "{{ $booking->street }}",
            billingAddressCity: "{{ $booking->city}}",
            billingAddressCountry: "{{ $booking->country }}",
            amount: "{{ $amount }}",
            currencyCode: "{{ $currencyCode }}",
            paymentType: "1",
            notifyUrl: "https://staging.vacayguider.com/api/payable-notify"
        };

        // Start payment
        window.onload = function () {
            try {
                payablePayment(paymentData);
            } catch (e) {
                console.error('Payment error:', e);
            }
        };
    </script>
</body>
</html>
