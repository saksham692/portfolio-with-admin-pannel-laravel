<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Education;
use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use App\Models\Category;
use App\Models\Feedback;
use App\Mail\ContactMail;
use App\Models\SkillItem;
use App\Models\Experience;
use App\Models\TyperTitle;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Models\BlogSectionSetting;
use App\Models\SkillSectionSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactSectionSetting;
use App\Models\FeedbackSectionSetting;
use App\Models\PortfolioSectionSetting;

class BlogController extends Controller
{
    public function index(Request $request, $category = null)
    {
        // Retrieve the search query or set it to null if not provided
        $search = $request->input('search') ?: null;

        // Fetch blogs with optional search filter
        $blogs = Blog::when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('content', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        })
            ->when($category, function ($query, $category) {
                return $query->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
            })
            ->latest()
            ->paginate(5);

        // Other data for the page
        if ($category != null) {
            $searchedCategory = BlogCategory::where('slug', $category)->first();
        } else {
            $searchedCategory = null;
        }
        $categories = BlogCategory::latest()->take(6)->get();
        $latestBlogs = Blog::where('published', 1)->latest()->take(3)->get();
        $oldBlogs = Blog::where('published', 1)->oldest()->take(3)->get();

        return view('frontend.pages.blog.index', compact('blogs', 'categories', 'latestBlogs', 'oldBlogs', 'search', 'searchedCategory'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $categories = BlogCategory::latest()->take(6)->get();
        $latestBlogs = Blog::where('published', 1)->latest()->take(3)->get();
        $previousPost = Blog::where('published', 1)->where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextPost = Blog::where('published', 1)->where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
        return view('frontend.pages.blog.show', compact('blog', 'previousPost', 'nextPost', 'categories', 'latestBlogs'));
    }

}
