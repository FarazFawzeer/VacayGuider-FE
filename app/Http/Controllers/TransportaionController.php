<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VehicleDetail;
use App\Models\VehicleBooking;
use Illuminate\Support\Facades\Mail;
use App\Models\TransportationBooking;


class TransportaionController extends Controller
{

    public function index(Request $request)
    {
        // Only fetch vehicles of type Car, Jeep, or Van
        $query = VehicleDetail::whereIn('type', ['Car', 'Jeep', 'Van']);

        // Get distinct vehicle types for the filter sidebar
        $vehicleTypes = VehicleDetail::select('type')
            ->whereIn('type', ['Car', 'Jeep', 'Van'])
            ->distinct()
            ->pluck('type');

        // Apply additional filtering if selected types are passed in the request
        if ($request->has('types')) {
            $types = $request->input('types'); // expects array
            $query->whereIn('type', $types);
        }

        $vehicles = $query->paginate(6);

        return view('frontend.pages.transportation', compact('vehicles', 'vehicleTypes'));
    }





    public function showDetails($id)
    {
        $vehicle = VehicleDetail::findOrFail($id);
        return view('frontend.pages.transportation-detail', compact('vehicle'));
    }

    public function filterVehicles(Request $request)
    {
       $query = VehicleDetail::query()
        ->where('availability', true)
        ->whereIn('type', ['Car', 'Jeep', 'Van']); // Limit to only these types

    if ($request->filled('types')) {
        $query->whereIn('type', (array) $request->types);
    }

    $vehicles = $query->paginate(6);
        return view('frontend.partials.transportaion_cards', compact('vehicles'))->render();
    }

  public function store(Request $request)
{
    // Validate form input
    $validated = $request->validate([
        'vehicle_id' => 'required|exists:vehicle_details,id',
        'fullName' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:50',
        'whatsapp' => 'required|string|max:50',
        'country' => 'required|string|max:100',
        'startDate' => 'required|date',
        'startTime' => 'required|date_format:H:i',
        'endDate' => 'required|date|after_or_equal:startDate',
        'endTime' => 'required|date_format:H:i',
        'pickupLocation' => 'required|string|max:255',
        'dropLocation' => 'required|string|max:255',
        'serviceType' => 'required|string|in:transport,hourly',
        'hourCount' => 'nullable|integer|min:1',
        'message' => 'nullable|string',
    ]);

    // Create booking entry
    $booking = TransportationBooking::create([
        'vehicle_id' => $validated['vehicle_id'],
        'full_name' => $validated['fullName'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'whatsapp' => $validated['whatsapp'],
        'country' => $validated['country'],
        'start_date' => $validated['startDate'],
        'start_time' => $validated['startTime'],
        'end_date' => $validated['endDate'],
        'end_time' => $validated['endTime'],
        'pickup_location' => $validated['pickupLocation'],
        'drop_location' => $validated['dropLocation'],
        'service_type' => $validated['serviceType'],
        'hour_count' => $validated['hourCount'] ?? null,
        'message' => $validated['message'] ?? '',
    ]);

    // Optional: Load vehicle relationship if needed
    $booking->load('vehicle');

    // Send confirmation email (assuming you have this Mailable set up)
    Mail::to($booking->email)->send(new \App\Mail\TransportBookingConfirmationMail($booking));

    // Redirect back with success message
    return redirect()->back()->with('success', 'Booking submitted successfully!');
}
}
