<?php

namespace App\Http\Controllers;

use App\Models\PackageBooking;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PackageBookingController extends Controller
{
    //


  public function store(Request $request)
    {
       $data = $request->validate([
    'fullName' => 'required|string|max:255',
    'lastName' => 'required|string|max:255',
    'street' => 'required|string|max:255',
    'city' => 'required|string|max:100',
    'country' => 'required|string|max:100',
    'email' => 'required|email|max:255',
    'phone' => 'required|string|max:50',
    'whatsapp' => 'required|string|max:50',
    'adults' => 'required|integer|min:0',
    'children' => 'nullable|integer|min:0',
    'infants' => 'nullable|integer|min:0',
    'package' => 'required|exists:packages,id',
    'startDate' => 'required|date',
    'endDate' => 'required|date|after_or_equal:startDate',
    'message' => 'nullable|string',
]);

$latestBooking = PackageBooking::orderBy('id', 'desc')->first();
$lastInvoiceId = $latestBooking ? $latestBooking->invoice_id : null;

if ($lastInvoiceId && preg_match('/INV(\d+)/', $lastInvoiceId, $matches)) {
    $nextNumber = (int)$matches[1] + 1;
} else {
    $nextNumber = 1;
}

$invoiceId = 'INV' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT); // e.g., INV0001
       $booking = PackageBooking::create([
    'full_name' => $data['fullName'],
    'last_name' => $data['lastName'],
    'street' => $data['street'],
    'city' => $data['city'],
    'country' => $data['country'],
    'email' => $data['email'],
    'phone' => $data['phone'],
    'whatsapp' => $data['whatsapp'],
    'adults' => $data['adults'],
    'children' => $data['children'] ?? 0,
    'infants' => $data['infants'] ?? 0,
    'package_id' => $data['package'],
    'start_date' => $data['startDate'],
    'end_date' => $data['endDate'],
    'message' => $data['message'] ?? null,
    'invoice_id' => $invoiceId,
]);

        // Send confirmation email (optional)
        // Mail::to($booking->email)->send(new BookingConfirmation($booking));

        // Payment setup
        $merchantKey = env('PAYABLE_MERCHANT_KEY');
        $merchantToken = env('PAYABLE_MERCHANT_TOKEN');
        
  $package = Package::findOrFail($data['package']);

$amount = number_format($package->price, 2, '.', ''); // Ensures two decimals
$currencyCode = env('APP_CURRENCY', 'USD');

$orderDescription = "Tour Booking for Package: " . $booking->package->heading;
        $orderDescription = preg_replace('/[^A-Za-z0-9 .,]/', '', $orderDescription);
        $orderDescription = substr($orderDescription, 0, 100);

        $baseUrl = config('app.url');
        
        
Log::info('Order Des received:', ['orderDescription' => $orderDescription]);
        $returnUrl = $baseUrl . '/payable-return';
        $notifyUrl = $baseUrl . '/payable-notify';
        $logoUrl = $baseUrl . '/public/assets/img/vacayguider.png';
        
        //   dd($notifyUrl);

 $mToken = strtoupper(hash('sha512', $merchantToken));
$val = $merchantKey . '|' . $invoiceId . '|' . $amount . '|' . $currencyCode . '|' . $mToken;
$checkValue = strtoupper(hash('sha512', $val));
// dd([
//     'merchantKey' => $merchantKey,
//     'invoiceId' => $invoiceId,
//     'amount' => $amount,
//     'currencyCode' => $currencyCode,
//     'mToken' => $mToken,
//     'val' => $val,
//     'checkValue' => $checkValue
// ]);
// dd($checkValue);
session([
    'booking_id' => $booking->id,
    'merchant_key' => $merchantKey,
    'merchant_token' => $merchantToken,
    'check_value' => $checkValue,
    'amount' => $amount,
    'currency' => $currencyCode,
    'invoice_id' => $invoiceId,
    'order_description' => $orderDescription,
    'return_url' => $returnUrl,
    'notify_url' => $notifyUrl,
    'logo_url' => $logoUrl
]);

// Redirect to a separate route that loads the checkout page
return redirect()->route('payment.launch');
    }

// public function paymentNotify(Request $request) // ✅ match the route
// {
//     $data = $request->json()->all();

//     Log::info('PAYable notify callback:', $data);

//     $invoiceNo = $data['invoiceNo'] ?? null;
//     $statusCode = $data['statusCode'] ?? null;

//     $booking = PackageBooking::where('invoice_id', $invoiceNo)->first();

//     if ($booking && $statusCode == 1) {
//         $booking->payment_status = 'paid';
//         $booking->transaction_id = $data['payableTransactionId'] ?? null;
//         $booking->order_id = $data['payableOrderId'] ?? null;
//         $booking->payment_method = $data['paymentScheme'] ?? null;
//         $booking->payable_amount = $data['payableAmount'] ?? null;
//         $booking->payable_currency = $data['payableCurrency'] ?? null;
//         $booking->status_message = $data['statusMessage'] ?? null;
//         $booking->save();

//         Log::info("Booking #{$booking->id} marked as paid.");
//     } else {
//         Log::warning("Booking with invoice {$invoiceNo} not found or payment failed.");
//     }

//     return response()->json(['status' => 'received'], 200);
// }


// public function paymentNotify(Request $request)
// {
//     $data = $request->all(); // Use all() to support both JSON & form-encoded

//     $logKey = uniqid('payable_', true);
//     Log::channel('daily')->info("[$logKey] PAYable Webhook Received", $data);

//     $invoiceNo = $data['invoiceNo'] ?? null;
//     $statusCode = $data['statusCode'] ?? null;

//     if (!$invoiceNo) {
//         Log::warning("[$logKey] Missing invoiceNo in webhook.");
//         return response()->json(['error' => 'Missing invoiceNo'], 400);
//     }

//     $booking = PackageBooking::where('invoice_id', $invoiceNo)->first();

//     if (!$booking) {
//         Log::warning("[$logKey] No booking found for invoice: {$invoiceNo}");
//         return response()->json(['error' => 'Booking not found'], 404);
//     }

//     if ($statusCode == 1) { // Success
//         $booking->payment_status = 'paid';
//         $booking->transaction_id = $data['payableTransactionId'] ?? null;
//         $booking->order_id = $data['payableOrderId'] ?? null;
//         $booking->payment_method = $data['paymentScheme'] ?? null;
//         $booking->payable_amount = $data['payableAmount'] ?? null;
//         $booking->payable_currency = $data['payableCurrency'] ?? null;
//         $booking->status_message = $data['statusMessage'] ?? null;
//         $booking->save();

//         Log::info("[$logKey] Booking #{$booking->id} marked as paid.");
//     } else {
//         Log::info("[$logKey] Payment failed or pending for invoice: {$invoiceNo}, statusCode: {$statusCode}");
//         $booking->status_message = $data['statusMessage'] ?? 'Unknown';
//         $booking->payment_status = 'failed';
//         $booking->save();
//     }

//     return response()->json(['status' => 'success'], 200);
// }



public function handlePayableWebhook(Request $request)
    {
        $data = $request->all();

        Log::info('PAYable notify received', [
            'headers' => $request->headers->all(),
            'body' => $data,
            'ip' => $request->ip(),
        ]);

        return response()->json(['Status' => 200, 'Message' => 'Webhook received']);
    }



    public function paymentReturn(Request $request)
    {
        
              Log::info('payment return received:', $request->all());
              


        //   return view('frontend.pages.payment-return');
         return redirect()->route('home');
    }


    // public function handleNotify(Request $request)
    // {
    //     $data = $request->all();

    //     // Match with your stored booking
    //     $booking = PackageBooking::where('invoice_id', $data['invoiceNo'])->first();

    //     if ($booking && $data['statusCode'] == 1 && $data['statusMessage'] == 'SUCCESS') {
    //         $booking->update([
    //             'payment_status' => 'paid',
    //             'payable_order_id' => $data['payableOrderId'],
    //             'payable_transaction_id' => $data['payableTransactionId'],
    //         ]);
    //     }

    //     return response()->json(['Status' => 200]);
    // }
    
    
   
    // protected $merchantKey = '5D253C3C5554E7B2';
    // protected $merchantToken = '4058D13BA2E19E9D102978782B917846';

    // public function showCheckout()
    // {
    //     $invoiceId = 'INV0002301';
    //     $amount = '999.12';
    //     $currencyCode = 'LKR';

    //     $checkValue = $this->generateCheckValue($this->merchantKey, $invoiceId, $amount, $currencyCode, $this->merchantToken);

    //     return view('payable.checkout', [
    //         'invoiceId' => $invoiceId,
    //         'amount' => $amount,
    //         'currencyCode' => $currencyCode,
    //         'checkValue' => $checkValue,
    //         'merchantKey' => $this->merchantKey,
    //     ]);
    // }

    // private function generateCheckValue($merchantKey, $invoiceId, $amount, $currencyCode, $merchantToken)
    // {
    //     $tokenHash = strtoupper(hash('sha512', $merchantToken));
    //     $dataString = $merchantKey . '|' . $invoiceId . '|' . $amount . '|' . $currencyCode . '|' . $tokenHash;
    //     return strtoupper(hash('sha512', $dataString));
    // }

    // // PAYable server callback (notifyUrl)
    // public function paymentNotify(Request $request)
    // {
    //     $data = $request->all();

    //     \Log::info('PAYable Notification Received:', $data);

    //     if (isset($data['statusCode']) && $data['statusCode'] == 1) {
    //         // Payment Success - update your database accordingly
    //     } else {
    //         // Payment failed or pending
    //     }

    //     return response()->json(['Status' => 200]);
    // }

    // // Redirect after payment (returnUrl)
    // public function paymentReturn(Request $request)
    // {
    //     return view('payable.return');
    // }
}
