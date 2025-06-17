<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleDetail;
use App\Models\VehicleBooking;
use Illuminate\Support\Facades\Mail;


class RentVehicleController extends Controller
{

    public function index(Request $request)
    {
        $query = VehicleDetail::query();

        // Get distinct vehicle types for the filter sidebar
        $vehicleTypes = VehicleDetail::select('type')->distinct()->pluck('type');

        // Optionally, apply filtering by selected types here
        if ($request->has('types')) {
            $types = $request->input('types'); // expects array
            $query->whereIn('type', $types);
        }

        $vehicles = $query->paginate(6);

        return view('frontend.pages.rent', compact('vehicles', 'vehicleTypes'));
    }




    public function showDetails($id)
    {
        $vehicle = VehicleDetail::findOrFail($id);
        return view('frontend.pages.rent-detail', compact('vehicle'));
    }

    public function filterVehicles(Request $request)
    {
        $query = VehicleDetail::query()->where('availability', true);

        if ($request->filled('types')) {
            $query->whereIn('type', (array) $request->types);
        }

        $vehicles = $query->paginate(6);

        return view('frontend.partials.vehicle_cards', compact('vehicles'))->render();
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicle_details,id',
            'fullName' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'whatsapp' => 'required|string|max:50',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'message' => 'nullable|string',
        ]);

        $bookingData = VehicleBooking::create([
            'vehicle_id' => $validated['vehicle_id'],
            'full_name' => $validated['fullName'],
            'country' => $validated['country'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'whatsapp' => $validated['whatsapp'],
            'start_date' => $validated['startDate'],
            'end_date' => $validated['endDate'],
            'message' => $validated['message'] ?? '',
        ]);

        $bookingData->load('vehicle');
        Mail::to($bookingData->email)->send(new \App\Mail\BookingConfirmationMail($bookingData));

            return redirect()->back()->with('success', 'Booking submitted successfully!');
    }
}
