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
    // Get distinct, normalized source list
    $sources = Testimonial::select(DB::raw('LOWER(TRIM(source)) as source_normalized'))
        ->whereNotNull('source')
        ->where('source', '!=', '')
        ->distinct()
        ->pluck('source_normalized');

    // Get selected sources (array or empty)
    $sourceFilter = $request->input('source', []); // Will return array of selected sources or []

    $query = Testimonial::query();

    if (!empty($sourceFilter)) {
        $sourceFilterNormalized = array_map(fn($s) => strtolower(trim($s)), $sourceFilter);
        $query->whereIn(DB::raw('LOWER(TRIM(source))'), $sourceFilterNormalized);
    }

    $testimonials = $query->orderBy('postedate', 'desc')->paginate(4);
    $blogPosts = BlogPost::orderBy('posted_time', 'desc')->get();

    return view('frontend.pages.blog', compact('testimonials', 'sources', 'sourceFilter', 'blogPosts'));
}





}
