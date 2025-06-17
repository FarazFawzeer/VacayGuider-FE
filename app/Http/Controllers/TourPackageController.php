<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\TourSummary;
use App\Http\Controllers\Controller;

class TourPackageController extends Controller
{
    /**
     * Show all inbound tour packages
     */



    public function index(Request $request)
    {
        // Get filter values from the request
        $themes = $request->input('themes', []);
        $types = $request->input('types', []);
        $days = $request->input('days');

        // Base query with join
        $query = Package::select('packages.*')
            ->where('packages.status', 1)
            ->where('packages.type', 'inbound') 
            ->with('tourSummaries') // optional, if you want eager load
            ->leftJoin('tour_summaries', 'tour_summaries.package_id', '=', 'packages.id');

        // Filter by days
        if (!empty($days)) {
            $query->where('packages.days', '>=', (int)$days);
        }

        // Filter by theme (from tour_summaries)
        if (!empty($themes)) {
            $query->whereIn('tour_summaries.theme', $themes);
        }

        // Filter by tour type (from packages)
        if (!empty($types)) {
            $query->whereIn('packages.tour_type', $types);
        }

        // Avoid duplicate packages due to join
        $query->distinct('packages.id');

        // Paginate results
        $packages = $query->paginate(6);

        // Get distinct filter data for sidebar
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

        return view('frontend.pages.inbound', compact(
            'packages',
            'allThemes',
            'allTypes',
            'minDay',
            'maxDay'
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

        
        $query = Package::select('packages.*')
            ->leftJoin('tour_summaries', 'tour_summaries.package_id', '=', 'packages.id')
            ->where('packages.status', 1)
            ->where('packages.type', 'inbound');

        if ($request->filled('days')) {
            $query->where('packages.days', '>=', (int) $request->days);
        }

        if ($request->filled('themes')) {
            $query->whereIn('tour_summaries.theme', (array) $request->themes);
        }

        if ($request->filled('types')) {
            $query->whereIn('packages.tour_type', (array) $request->types);
        }

        $packages = $query->distinct()->paginate(6);

        return view('frontend.components.tour-cards', compact('packages'))->render();
    }
}
