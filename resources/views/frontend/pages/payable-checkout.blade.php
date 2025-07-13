<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PAYable Checkout</title>
    <script src="https://sandboxipgsdk.payable.lk/sdk/v4/payable-checkout.js"></script>
</head>
<body>
    <h1>Redirecting to Payment...</h1>

    <noscript>
        <div style="padding: 20px; background: #ffe5e5; color: #b00020; text-align: center;">
            JavaScript is required to complete the payment.<br>
            Please enable JavaScript or open this page in your browser.
        </div>
    </noscript>

    <script>
        const paymentData = {
            notifyUrl: "{{ $notifyUrl }}",
            returnUrl: "{{ $returnUrl }}",
            logoUrl: "{{ $logoUrl }}",
            merchantKey: "{{ $merchantKey }}",
            checkValue: "{{ $checkValue }}",
            orderDescription: "{{ $orderDescription }}",
            invoiceId: "{{ $invoiceId }}",
            customerFirstName: "{{ explode(' ', $booking->full_name)[0] ?? 'Guest' }}",
            customerLastName: "Fernando", // Replace with real value
            customerMobilePhone: "{{ $booking->phone }}",
            customerEmail: "{{ $booking->email }}",
            billingAddressStreet: "Main Street",
            billingAddressCity: "Colombo",
            billingAddressCountry: "LKA",
            amount: "{{ $amount }}",
            currencyCode: "{{ $currency }}",
            paymentType: "1"
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
