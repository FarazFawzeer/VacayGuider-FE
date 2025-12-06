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
    $query = VehicleDetail::query()->where('status', 1); // <-- SHOW ONLY ACTIVE VEHICLES

    // Get distinct vehicle types
    $vehicleTypes = VehicleDetail::where('status', 1) // <-- also apply status here
        ->select('type')
        ->distinct()
        ->pluck('type')
        ->map(function ($type) {
            return strtolower($type);
        });

    // Custom order
    $customOrder = ['cycle', 'electricbike', 'tuktuk', 'scooter', 'motorcycle', 'car', 'jeep', 'van'];

    $vehicleTypes = collect($customOrder)
        ->filter(fn($type) => $vehicleTypes->contains($type))
        ->values();

    // Filter by types
    if ($request->has('types')) {
        $query->whereIn('type', $request->types);
    }

    $vehicles = $query->paginate(6);

    // Slider vehicles also must be active only
    $vehiclesslide = VehicleDetail::where('status', 1)->get();

    return view('frontend.pages.rent', compact('vehicles', 'vehicleTypes', 'vehiclesslide'));
}





    public function showDetails($id)
    {
        $vehicle = VehicleDetail::findOrFail($id);
        return view('frontend.pages.rent-detail', compact('vehicle'));
    }

  public function filterVehicles(Request $request)
{
    $query = VehicleDetail::query()->where('status', 1); // <-- ONLY ACTIVE VEHICLES

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


        return response()->json(['message' => 'Application submitted successfully!'], 200);
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

        // Store files
        $licenseFrontPath = $request->file('license_front')->store('licenses', 'public');
        $licenseBackPath = $request->file('license_back')->store('licenses', 'public');
        $selfiePath = $request->file('selfie')->store('selfies', 'public');

        // Save to DB
        DrivingPermitRequest::create([
            'guest_name' => $validated['guest_name'],
            'email' => $validated['email'],
            'license_no' => $validated['license_no'],
            'whatsapp' => $validated['whatsapp'],
            'license_front' => $licenseFrontPath,
            'license_back' => $licenseBackPath,
            'selfie' => $selfiePath,
            'collection_method' => $validated['collection_method'],
            'status' => 'pending',
        ]);

        // Always return JSON
        return response()->json(['message' => 'Application submitted successfully!'], 200);
    }
}
