<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'categories' => 'nullable',
            'description' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'published' => 'required|boolean',
            'published_at' => 'nullable|date',
            'allow_comments' => 'nullable|boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('meta_image')) {
            $image = $request->file('meta_image');
            $imageName = 'blog_image_'.time().'.'.$image->getClientOriginalExtension();
            $file = $image->move(public_path('uploads/blogs'), $imageName); // Store in public storage
            $validated['meta_image'] = '/uploads/blogs/'.$imageName; // Save path to database
        }
        $validated['published_at'] = $request->published ? now()->format('Y-m-d') : Null;

        $blog = Blog::create($validated);

        $blog->categories()->sync($request->categories);

        toastr('Created Successfully!', 'success');

        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = BlogCategory::all();
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'categories' => 'nullable',
            'description' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published' => 'required|boolean',
            'published_at' => 'nullable|date',
            'allow_comments' => 'nullable|boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('meta_image')) {
            $image = $request->file('meta_image');
            $imageName = 'blog_image_'.time().'.'.$image->getClientOriginalExtension();
            $file = $image->move(public_path('uploads/blogs'), $imageName); // Store in public storage
            $validated['meta_image'] = '/uploads/blogs/'.$imageName; // Save path to database

            // Optionally delete the old image (if required)
            if($blog->meta_image && \File::exists(public_path($blog->meta_image))) {
                \File::delete(public_path($blog->meta_image));
            }
        }
        $validated['published_at'] = $request->published ? ($blog->published_at ? $blog->published_at : now()->format('Y-m-d')) : Null;
//        if (strcmp($blog->title, $validated['title']) == 0) {
//            $validated['slug'] = '';
//        }
        // Update the blog
        $blog->update($validated);

        $blog->categories()->sync($request->categories);

        toastr('Updated Successfully!', 'success');

        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        deleteFileIfExist($blog->meta_image);
        $blog->delete();
    }
}
