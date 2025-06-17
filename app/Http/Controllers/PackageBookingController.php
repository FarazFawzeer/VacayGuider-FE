<?php

namespace App\Http\Controllers;

use App\Models\PackageBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use App\Http\Controllers\Controller;

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
    ]);

    Mail::to($booking->email)->send(new BookingConfirmation($booking));

    return back()->with('success', 'Your booking has been submitted!');
}
}
