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
// Start the query
    $query = BlogPost::query();

    // If the user clicked a category, filter by that type
    if ($request->has('type')) {
        $query->where('type', $request->type);
    }

    // Get the results (using latest to keep the 'feed' feel)
    $blogs = $query->latest()->get();

    return view('frontend.pages.blog', compact('blogs'));
}

  public function filterPosts(Request $request)
    {
        $blogTypeFilter = $request->input('blog_type', []);
        $blogQuery = BlogPost::query();

        if (!empty($blogTypeFilter)) {
            $blogQuery->whereIn('type', $blogTypeFilter);
        }

        $blogPosts = $blogQuery->orderBy('posted_time', 'desc')->get();

        $html = view('frontend.pages.partials.blog_list', compact('blogPosts'))->render();

        return response()->json(['html' => $html]);
    }

    /**
     * Returns rendered testimonials partial HTML according to source[] filter + page param.
     * AJAX GET
     */
    public function filterTestimonials(Request $request)
    {
        $sourceFilter = $request->input('source', []);
        $page = $request->input('page', 1);

        $testimonialQuery = Testimonial::query();

        if (!empty($sourceFilter)) {
            $sourceFilterNormalized = array_map(fn($s) => strtolower(trim($s)), (array)$sourceFilter);
            $testimonialQuery->whereIn(DB::raw('LOWER(TRIM(source))'), $sourceFilterNormalized);
        }

        $testimonials = $testimonialQuery->orderBy('postedate', 'desc')->paginate(4, ['*'], 'page', $page);

        $html = view('frontend.pages.partials.testimonial_list', compact('testimonials'))->render();

        return response()->json(['html' => $html]);
    }



}
