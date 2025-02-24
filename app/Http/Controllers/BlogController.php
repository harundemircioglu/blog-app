<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogPivot;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where('user_id', auth()->user()->id)->get();

        return view('blog.myBlogs', [
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = BlogCategory::all();

        return view('blog.create', [
            'blogCategories' => $blogCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = new Blog();
        $blog->user_id = auth()->user()->id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();

        $categories = $request->category;

        foreach ($categories as $category) {
            $blogPivot = new BlogPivot();
            $blogPivot->blog_id = $blog->id;
            $blogPivot->blog_category_id = $category;
            $blogPivot->save();
        }

        return redirect()->route('home')->with(['messages' => 'The blog created is successfly']);
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
        $blog = Blog::with('categories')->find($id);

        $blogCategories = BlogCategory::all();

        return view('blog.edit', [
            'blog' => $blog,
            'blogCategories' => $blogCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, string $id)
    {
        $blog = Blog::with('categories')->find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();

        $blog->categories()->delete();

        $categories = $request->category;

        foreach ($categories as $category) {
            $blogPivot = new BlogPivot();
            $blogPivot->blog_id = $blog->id;
            $blogPivot->blog_category_id = $category;
            $blogPivot->save();
        }

        return redirect()->route('blog.index')->with(['messages' => 'The blog updated is successfly']);
    }

    public function detail(Blog $blog)
    {
        $blog->load(['categories.category', 'user']);

        return view('blog.detail', [
            'blog' => $blog
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect()->route('blog.index')->with(['messages' => 'The blog deleted is successfly']);
    }
}
