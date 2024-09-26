<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     // Pastikan pengguna terautentikasi
     if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You need to be logged in to perform this action.');
    }

    // Ambil pengguna saat ini
    $user = Auth::user();

    // Validasi input
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|exists:categories,id',
        'slug' => 'required|string',
        'body' => 'required|string',
    ]);

    // Buat post baru
    $post = new Post();
    $post->title = $validated['title'];
    $post->category_id = $validated['category'];
    $post->body = $validated['body'];
    $post->author_id = $user->id;
    $post->slug = Str::slug($validated['title']);
    $post->save();

    // Redirect atau respon sesuai kebutuhan
    return redirect()->back()->with('success', 'Post created successfully!');
}
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
{
    $post = Post::where('slug', $slug)->firstOrFail();

    // dd($request->all());

    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'body' => 'required',
    ]);

    $post->update([
        'title' => $request->input('title'),
        'category_id' => $request->input('category_id'),
        'body' => $request->input('body'),
    ]);

    return redirect()->route('profile', $post->slug)
                     ->with('update', 'Post updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        //
        $post = Post::where('slug', $slug)->firstOrFail();
    $post->delete();

    // dd('deleted');

    return redirect()->route('profile') // atau halaman lain yang diinginkan
                     ->with('delete', 'Post deleted successfully');
    }
}
