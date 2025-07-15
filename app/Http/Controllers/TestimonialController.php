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
    // --- Testimonial Logic ---
    $sources = Testimonial::select(DB::raw('LOWER(TRIM(source)) as source_normalized'))
        ->whereNotNull('source')
        ->where('source', '!=', '')
        ->distinct()
        ->pluck('source_normalized');

    $sourceFilter = $request->input('source', []);
    $testimonialQuery = Testimonial::query();

    if (!empty($sourceFilter)) {
        $sourceFilterNormalized = array_map(fn($s) => strtolower(trim($s)), $sourceFilter);
        $testimonialQuery->whereIn(DB::raw('LOWER(TRIM(source))'), $sourceFilterNormalized);
    }

    $testimonials = $testimonialQuery->orderBy('postedate', 'desc')->paginate(4);

    // --- Blog Filter Logic ---
    $blogTypes = BlogPost::select('type')->distinct()->pluck('type')->filter(); // get distinct types
    $blogTypeFilter = $request->input('blog_type', []);

    $blogQuery = BlogPost::query();

    if (!empty($blogTypeFilter)) {
        $blogQuery->whereIn('type', $blogTypeFilter);
    }

    $blogPosts = $blogQuery->orderBy('posted_time', 'desc')->get();

    return view('frontend.pages.blog', compact('testimonials', 'sources', 'sourceFilter', 'blogPosts', 'blogTypes', 'blogTypeFilter'));
}






}
