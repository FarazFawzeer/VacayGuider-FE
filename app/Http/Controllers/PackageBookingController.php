<?php

namespace App\Http\Controllers;

use App\Models\PackageBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PackageBookingController extends Controller
{
    //


  public function store(Request $request)
    {
        $data = $request->validate([
            'fullName' => 'required|string|max:255',
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

        $invoiceId = 'INV' . strtoupper(Str::random(10));
        $booking = PackageBooking::create([
            'full_name' => $data['fullName'],
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
        Mail::to($booking->email)->send(new BookingConfirmation($booking));

        // Payment setup
        $merchantKey = env('PAYABLE_MERCHANT_KEY');
        $merchantToken = env('PAYABLE_MERCHANT_TOKEN');
        $amount = '600.00'; // Can be dynamic
        $currency = 'LKR';

        $orderDescription = "Tour Booking for Package #" . $booking->package_id;
        $orderDescription = preg_replace('/[^A-Za-z0-9 .,]/', '', $orderDescription);
        $orderDescription = substr($orderDescription, 0, 100);

        $baseUrl = config('app.url');

        $returnUrl = $baseUrl . '/payable-return';
        $notifyUrl = $baseUrl . '/payable-notify';
        $logoUrl = $baseUrl . '/public/assets/img/vacayguider.png';

 $mToken = strtoupper(hash('sha512', $merchantToken));
$val = $merchantKey . '|' . $invoiceId . '|' . $amount . '|' . $currency . '|' . $mToken;
$checkValue = strtoupper(hash('sha512', $val));

// dd($val);
session([
    'booking_id' => $booking->id,
    'merchant_key' => $merchantKey,
    'merchant_token' => $merchantToken,
    'check_value' => $checkValue,
    'amount' => $amount,
    'currency' => $currency,
    'invoice_id' => $invoiceId,
    'order_description' => $orderDescription,
    'return_url' => $returnUrl,
    'notify_url' => $notifyUrl,
    'logo_url' => $logoUrl
]);

// Redirect to a separate route that loads the checkout page
return redirect()->route('payment.launch');
    }

    public function paymentNotify(Request $request)
    {
        \Log::info('PAYable Notification Received:', $request->all());

        if (isset($request['statusCode']) && $request['statusCode'] == 1) {
            // Update your booking table as paid
            PackageBooking::where('invoice_id', $request['invoiceNo'])->update(['payment_status' => 'paid']);
        }

        return response()->json(['Status' => 200]);
    }

    public function paymentReturn(Request $request)
    {
        return view('frontend.pages.payment-return');
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
    
    
   
    // protected $merchantKey = '';
    // protected $merchantToken = ';

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
