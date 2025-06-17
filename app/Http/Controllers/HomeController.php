<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\TourSummary;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\VehicleDetail;

class HomeController extends Controller
{
    /**
     * Show all inbound tour packages
     */



    public function index(Request $request)
    {
        $packages = Package::where('status', 1)
            ->where('type', 'outbound')
            ->with('tourSummaries') // eager loads related summaries
            ->get();
        // No pagination

        $inboundPackages = Package::where('status', 1)
            ->where('type', 'inbound')
            ->with('tourSummaries')
            ->get()
            ->map(function ($package) {
                $imageExists = $package->picture && Storage::disk('public')->exists($package->picture);
                $package->display_picture = $imageExists
                    ? asset('storage/' . $package->picture)
                    : asset('assets/img/tour/yala.jpg');
                return $package;
            });

              $vehicles = VehicleDetail::where('status', 1)->get();

            



        return view('frontend.pages.home', compact('packages', 'inboundPackages','vehicles'));
    }
}
