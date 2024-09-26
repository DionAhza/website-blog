<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use Psy\Readline\Hoa\Console;

use function Laravel\Prompts\error;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('/register', function(){
    return view('register');
});
use Illuminate\Support\Facades\Auth;


//profile
Route::get('/profile', function () {
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'You need to be logged in to view this page.');
    }
    return view('profile', [
        'title' => 'Profile page',
        'user' => $user,
        'jumlah' => count($user->posts),
        'posts' => $user->posts,
        'genres' => Category::all(), // Menampilkan semua kategori
        'judul' => null // Untuk form edit, null karena belum ditentukan
    ]);
})->name('profile');

// Rute untuk mengupdate post
Route::put('/post/{slug}', [PostController::class, 'update'])->name('post.update');

// Rute untuk menghapus post
Route::delete('/post/{slug}', [PostController::class, 'destroy'])->name('post.destroy');
//------------------------------------------------------------------------------------------------------------------
Route::get('/register',function(){
    return view('register');
});
Route::post('/register/create',[LoginController::class ,'store'])->name('register');
// {{-- ---------- --}}
Route::get('/home', function () { 
    return view('home',['title' => 'Home Page']);
})->name('home');
Route::get('/about', function () {
    return view('about',['nama'=>'Dion Ahza Rabbani', 'title' => 'About Page','email'=>'DionAhza15@gmail.com']);
});
Route::get('/posts', function () {
    // $post = Post::with(['author','category'])->latest()->get();

    return view('posts',['title' => 'Blog page', 'posts' => Post::filter(request(['search','category']))->latest()->get() , 'genres'=>Category::get()]);
});
Route::middleware('auth')->group(function () {
    Route::post('/post/create', [PostController::class, 'store']);
});
  
Route::get('/post/{post:slug}', function(Post $post){ 
//  $post = Post::find($slug); 
    return view('post',['title'=>'single post','post' => $post]);
});                                                           
Route::get('/authors/{user:username}', function(User $user){
    // $post = $user->posts->load('category','acuthor');
    return view('posts',['title'=> count($user->posts).' Articles by '.$user->name,'posts' => $user->posts,"genres"=>Category::get()]);
});         
Route::get('/categories/{category:slug}', function(Category $category){
    // $post = $category->posts->load('category','author');
    return view('posts',['title'=> 'Articles in : '.$category->name,'posts' => $category->posts,"genres"=>Category::get()]);
});

Route::get('/contact', function () {
    return view('contact',['title' => 'Contact Page']);
});            