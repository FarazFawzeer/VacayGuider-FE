<?php

namespace App\Http\Controllers;

use App\Models\AirlineBooking;
use Illuminate\Http\Request;



class AirlineBookingController extends Controller
{
    //
      public function store(Request $request)
    {
        $validated = $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'tripType' => 'required|string',
            'airline' => 'nullable|string',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'departureDate' => 'required|date',
            'returnDate' => 'nullable|date',
            'passengers' => 'required|integer|min:1',
            'message' => 'nullable|string',
        ]);

        AirlineBooking::create([
            'full_name' => $validated['fullName'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'whatsapp' => $validated['whatsapp'],
            'country' => $validated['country'],
            'trip_type' => $validated['tripType'],
            'airline' => $validated['airline'],
            'from' => $validated['from'],
            'to' => $validated['to'],
            'departure_date' => $validated['departureDate'],
            'return_date' => $validated['returnDate'],
            'passengers' => $validated['passengers'],
            'message' => $validated['message'],
        ]);

        return back()->with('success', 'Your booking has been submitted successfully!');
    }
}
