<!DOCTYPE html>
<html>
<head>
    <title>PAYable Checkout</title>
    <script src="https://sandboxipgsdk.payable.lk/sdk/v4/payable-checkout.js"></script>
    <script>
        function startPayment() {
            const paymentData = {
                notifyUrl: "{{ url('/payable-notify') }}",  // Must be HTTPS accessible
                returnUrl: "{{ url('/payable-return') }}",  // Must be HTTPS accessible
                logoUrl: "https://yourdomain.com/logo.png", // Your HTTPS logo URL
                merchantKey: "{{ $merchantKey }}",
                checkValue: "{{ $checkValue }}",
                orderDescription: "Test Payment",
                invoiceId: "{{ $invoiceId }}",
                customerFirstName: "John",
                customerLastName: "Doe",
                customerMobilePhone: "0771234567",   // Correct SL local phone format
                customerEmail: "john@example.com",
                billingAddressStreet: "123 Test Street",
                billingAddressCity: "Colombo",
                billingAddressCountry: "LKA",
                amount: "{{ $amount }}",
                currencyCode: "{{ $currencyCode }}",
                paymentType: "1"   // One-time payment
            };
            payablePayment(paymentData);
        }
    </script>
</head>
<body>
    <h1>PAYable Payment</h1>
    <button onclick="startPayment()">Pay Now</button>
</body>
</html>
