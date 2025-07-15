<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\TourSummary;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\CustomTourRequest;

class TourPackageController extends Controller
{
    /**
     * Show all inbound tour packages
     */
    public function index(Request $request)
    {
        // Detect if request is AJAX for filtering
        $isAjax = $request->ajax();

        // Sidebar filters
        $allThemes = TourSummary::whereNotNull('theme')
            ->where('theme', '!=', '')
            ->distinct()
            ->pluck('theme');

        $allTypes = Package::whereNotNull('tour_type')
            ->where('tour_type', '!=', '')
            ->distinct()
            ->pluck('tour_type');

        $minDay = Package::whereNotNull('days')->min('days');
        $maxDay = Package::whereNotNull('days')->max('days');

        // Initial page load or filtered load
        if ($isAjax) {
            return $this->filter($request);
        }

        $specialTours = Package::where('status', 1)
            ->where('type', 'inbound')
            ->where('tour_category', 'special')
            ->paginate(4, ['*'], 'special_page');

        $cityTours = Package::where('status', 1)
            ->where('type', 'inbound')
            ->where('tour_category', 'city')
            ->paginate(4, ['*'], 'city_page');

        $tailorTours = Package::where('status', 1)
            ->where('type', 'inbound')
            ->where('tour_category', 'tailor')
            ->paginate(4, ['*'], 'tailor_page');

        $query = Package::select('packages.*')
            ->where('packages.status', 1)
            ->where('packages.type', 'inbound')
            ->with('tourSummaries')
            ->leftJoin('tour_summaries', 'tour_summaries.package_id', '=', 'packages.id');

        $packages = $query->get();

        return view('frontend.pages.inbound', compact(
            'specialTours',
            'cityTours',
            'tailorTours',
            'allThemes',
            'allTypes',
            'minDay',
            'maxDay',
            'packages'
        ));
    }

    /**
     * AJAX: Filter tour results by theme/type/days
     */
    public function filter(Request $request)
    {
        Log::info('Filter request', $request->all());

        $query = Package::select('packages.*')
            ->leftJoin('tour_summaries', 'tour_summaries.package_id', '=', 'packages.id')
            ->where('packages.status', 1)
            ->where('packages.type', 'inbound');

        if ($request->filled('days')) {
            $query->where('packages.days', '>=', (int) $request->days);
        }

        if ($request->has('theme') && is_array($request->theme)) {
            $query->whereIn('tour_summaries.theme', $request->theme);
        }

        if ($request->has('type') && is_array($request->type)) {
            $query->whereIn('packages.tour_type', $request->type);
        }

        $query->distinct();

        $packages = $query->paginate(6);

        return view('frontend.components.filtered-results', compact('packages'))->render();
    }

    /**
     * AJAX: Fetch tours by category (special/city/tailor)
     */
    public function getToursByCategory($category)
    {
        if (!in_array($category, ['special', 'city', 'tailor'])) {
            return response()->json(['message' => 'Invalid category'], 404);
        }

        $packages = Package::where('tour_category', $category)->paginate(9);

        return view('frontend.components.filtered-results', ['packages' => $packages]);
    }


    /**
     * Tour detail
     */
    public function show($id)
    {
        $package = Package::with([
            'tourSummaries',
            'detailItineraries.highlights'
        ])->findOrFail($id);

        $tourSummaries = $package->tourSummaries->map(function ($summary) {
            if (is_string($summary->images)) {
                $summary->images = json_decode($summary->images, true) ?? [];
            }

            if (is_string($summary->key_attributes)) {
                $summary->key_attributes = json_decode($summary->key_attributes, true) ?? [];
            }

            return $summary;
        });

        $package->detailItineraries->map(function ($itinerary) {
            if (is_string($itinerary->program_points)) {
                $itinerary->program_points = json_decode($itinerary->program_points, true) ?? [];
            }

            $itinerary->highlights->map(function ($highlight) {
                if (is_string($highlight->images) && str_starts_with($highlight->images, '[')) {
                    $highlight->images = json_decode($highlight->images, true) ?? [];
                } else {
                    $highlight->images = [$highlight->images];
                }

                return $highlight;
            });

            return $itinerary;
        });

        return view('frontend.pages.tour-detail', compact('package', 'tourSummaries'));
    }

    public function storeCustomTourRequest(Request $request)
    {
        $request->validate([
            'custom_name' => 'required|string|max:255',
            'custom_email' => 'required|email|max:255',
            'custom_phone' => 'required|string|max:20',
            'custom_message' => 'nullable|string',
            'custom_dates' => 'nullable|string|max:255',
            'custom_travelers' => 'nullable|string|max:255',
        ]);

        CustomTourRequest::create([
            'name' => $request->custom_name,
            'email' => $request->custom_email,
            'phone' => $request->custom_phone,
            'message' => $request->custom_message,
            'preferred_dates' => $request->custom_dates,
            'travelers' => $request->custom_travelers,
        ]);

        return response()->json(['success' => true, 'message' => 'Request submitted successfully!']);
    }
}
