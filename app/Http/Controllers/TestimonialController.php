<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    //
public function index(Request $request)
{
    // Normalize source: lowercase, trimmed, distinct
    $sources = Testimonial::select(DB::raw('LOWER(TRIM(source)) as source_normalized'))
        ->whereNotNull('source')
        ->where('source', '!=', '')
        ->distinct()
        ->pluck('source_normalized');

    // Normalize filter input
    $sourceFilter = strtolower(trim($request->input('source')));

    $query = Testimonial::query();

    if ($sourceFilter && in_array($sourceFilter, $sources->toArray())) {
        $query->whereRaw('LOWER(TRIM(source)) = ?', [$sourceFilter]);
    }

    $testimonials = $query->orderBy('postedate', 'desc')->paginate(4);

     $blogPosts = BlogPost::orderBy('posted_time', 'desc')->get();

    return view('frontend.pages.blog', compact('testimonials', 'sources', 'sourceFilter','blogPosts'));
}




}
