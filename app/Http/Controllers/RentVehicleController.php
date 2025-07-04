<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleDetail;
use App\Models\VehicleBooking;
use Illuminate\Support\Facades\Mail;
use App\Models\DrivingPermitRequest;


class RentVehicleController extends Controller
{

    public function index(Request $request)
    {
        $query = VehicleDetail::query();

        // Get distinct vehicle types
        $vehicleTypes = VehicleDetail::select('type')->distinct()->pluck('type')->map(function ($type) {
            return strtolower($type); // Normalize casing
        });

        // Define the desired custom order
        $customOrder = ['cycle', 'electricbike', 'tuktuk', 'motorcycle', 'car', 'jeep', 'van'];

        // Sort the vehicle types by the custom order
        $vehicleTypes = collect($customOrder)->filter(function ($type) use ($vehicleTypes) {
            return $vehicleTypes->contains($type);
        })->values(); // Keeps only existing types in the correct order

        // Apply filtering if vehicle types are selected
        if ($request->has('types')) {
            $types = $request->input('types');
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

    public function rentStore(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'email' => 'required|email',
            'license_no' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'license_front' => 'required|image',
            'license_back' => 'required|image',
            'selfie' => 'required|image',
            'collection_method' => 'required|in:pick_up,delivery',
        ]);

        // Store uploaded files
        $licenseFrontPath = $request->file('license_front')->store('licenses', 'public');
        $licenseBackPath = $request->file('license_back')->store('licenses', 'public');
        $selfiePath = $request->file('selfie')->store('selfies', 'public');

        // Save to database
        DrivingPermitRequest::create([
            'guest_name' => $validated['guest_name'],
            'email' => $validated['email'],
            'license_no' => $validated['license_no'],
            'whatsapp' => $validated['whatsapp'],
            'license_front' => $licenseFrontPath,
            'license_back' => $licenseBackPath,
            'selfie' => $selfiePath,
            'collection_method' => $validated['collection_method'],
        ]);

        return back()->with('success', 'Your driving permit request has been submitted successfully!');
    }
}
