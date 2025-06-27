<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\TourSummary;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class TourPackageController extends Controller
{
    /**
     * Show all inbound tour packages
     */



    public function index(Request $request)
    {
        // Detect if request is AJAX for filtering
        $isAjax = $request->ajax();

        // Prepare the base query
        $query = Package::select('packages.*')
            ->where('packages.status', 1)
            ->where('packages.type', 'inbound')
            ->with('tourSummaries')
            ->leftJoin('tour_summaries', 'tour_summaries.package_id', '=', 'packages.id');

        // Filters only if it's an AJAX request (filtering)
        if ($isAjax) {
            if (!empty($request->days)) {
                $query->where('packages.days', '>=', (int) $request->days);
            }

            if (!empty($request->themes)) {
                $query->whereIn('tour_summaries.theme', $request->themes);
            }

            if (!empty($request->types)) {
                $query->whereIn('packages.tour_type', $request->types);
            }

            $query->distinct();

            $packages = $query->paginate(6);

            return view('frontend.components.filtered-results', compact('packages'))->render(); // partial view
        }

        // ✅ Initial page load: fetch special & day tours using `tour_category`
        $specialTours = Package::where('status', 1)
            ->where('type', 'inbound')
            ->where('tour_category', 'special')
            ->paginate(6, ['*'], 'special_page'); // name the page param

        $dayTours = Package::where('status', 1)
            ->where('type', 'inbound')
            ->where('tour_category', 'day')
            ->paginate(6, ['*'], 'day_page');
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

        $packages = $query->get();

        return view('frontend.pages.inbound', compact(
            'specialTours',
            'dayTours',
            'allThemes',
            'allTypes',
            'minDay',
            'maxDay',
            'packages'
        ));
    }


    /**
     * Show detailed view of a specific tour package
     */


    public function show($id)
    {
        // Fetch package with related summaries, itineraries, and highlights
        $package = Package::with([
            'tourSummaries',
            'detailItineraries.highlights'
        ])->findOrFail($id);

        // Decode tour summaries fields
        $tourSummaries = $package->tourSummaries->map(function ($summary) {
            if (is_string($summary->images)) {
                $summary->images = json_decode($summary->images, true) ?? [];
            }

            if (is_string($summary->key_attributes)) {
                $summary->key_attributes = json_decode($summary->key_attributes, true) ?? [];
            }

            return $summary;
        });

        // Decode program_points and highlight images if stored as JSON
        $package->detailItineraries->map(function ($itinerary) {
            if (is_string($itinerary->program_points)) {
                $itinerary->program_points = json_decode($itinerary->program_points, true) ?? [];
            }

            $itinerary->highlights->map(function ($highlight) {
                // If `images` is stored as JSON array, decode it
                if (is_string($highlight->images) && str_starts_with($highlight->images, '[')) {
                    $highlight->images = json_decode($highlight->images, true) ?? [];
                } else {
                    // Otherwise treat it as a single string
                    $highlight->images = [$highlight->images];
                }

                return $highlight;
            });

            return $itinerary;
        });

        return view('frontend.pages.tour-detail', compact('package', 'tourSummaries'));
    }


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

        if ($request->has('theme') && is_array($request->themes)) {
            $query->whereIn('tour_summaries.theme', $request->themes);
        }

        if ($request->has('type') && is_array($request->types)) {
            $query->whereIn('packages.tour_type', $request->types);
        }

        $packages = $query->distinct()->paginate(6);

        return view('frontend.components.filtered-results', compact('packages'))->render();
    }
}
