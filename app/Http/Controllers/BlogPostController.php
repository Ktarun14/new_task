<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
        ]);

        BlogPost::create($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $post)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
        ]);

        $post->update($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Blog post deleted successfully.');
    }
}
