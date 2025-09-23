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
use App\Mail\BookingConfirmationMail;


class PackageBookingController extends Controller
{
    //


    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'       => 'required|string|max:255',
            'email'           => 'required|email',
            'phone'           => 'required|string|max:20',
            'country'         => 'required|string|max:255',
            'adults'          => 'required|integer|min:1',
            'children'        => 'nullable|integer|min:0',
            'check_in'        => 'required|date',
            'check_out'       => 'required|date|after:check_in',
            'pickup'          => 'nullable|string|max:255',
            'hotel_type'      => 'required|string|max:50',
            'travelling_from' => 'required|string|max:255',
            'travel_reason'   => 'nullable|string|max:255',
            'theme' => 'nullable|array',
            'theme.*' => 'string|max:255',
            'whatsapp'        => 'nullable|string|max:20',
            'message'         => 'nullable|string',
            'package'         => 'required|integer|exists:packages,id',
        ]);

        // Map dates & package
        $validated['theme'] = $request->theme;
        $validated['start_date'] = $validated['check_in'];
        $validated['end_date']   = $validated['check_out'];
        $validated['package_id'] = $validated['package'];
        unset($validated['check_in'], $validated['check_out'], $validated['package']);

        // Save booking
        $booking = PackageBooking::create($validated);

        // Send email to customer
        Mail::to($booking->email)->send(new BookingConfirmationMail($booking));

        // 🔹 Always return JSON for AJAX
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success'    => true,
                'message'    => 'Your booking request has been submitted successfully!',
                'booking_id' => $booking->id
            ]);
        }

        // Fallback (if someone submits without JS)
        return redirect()->back()->with('success', 'Your booking request has been submitted successfully!');
    }
}
