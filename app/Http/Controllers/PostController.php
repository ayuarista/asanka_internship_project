<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::query()->filter(request(['search', 'category', 'author']))->latest()->paginate(12)->withQueryString();
        return view('posts.index', [
            'title' => request('category') ? 'Category: ' . ucfirst(request('category')) : (request('author') ? 'Author: ' . ucfirst(request('author')) : 'Latest Posts'),
            'posts' => $posts
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', [
            'title' => 'Create New Post',
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $imagePath = $request->file('thumbnail') ? $request->file('thumbnail')->store('posts', 'public') : null;

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'thumbnail' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['author', 'category'])->firstOrFail();

        return view('posts.show', [
            'title' => 'Blog Detail',
            'post' => $post
        ]);
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all();

        return view('posts.edit', [
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = $post->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $imagePath = $request->file('thumbnail')->store('posts', 'public');
        }

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'thumbnail' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}




// public function index()
// {
//     $posts = Post::query()->filter(request(['search', 'category', 'author']))->latest()->paginate(12)->withQueryString();
//     return view('posts', [
//         'title' => request('category') ? 'Category: ' . ucfirst(request('category')):
//         (request('author') ? 'Author: ' . ucfirst(request('author')) : 'Latest Posts'),
//         'posts' => $posts
//     ]);
// }
// public function create(){
//     $categories = Category::all();
//     return view('posts.create', ['title' => 'Create New Post'], compact('categories'));
// }

// public function store(Request $request)
// {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'content' => 'required',
//     ]);

//     Post::create([
//         'title' => $request->title,
//         'content' => $request->content,
//     ]);

//     return redirect()->route('posts.index')->with('success', 'Post created successfully');
// }