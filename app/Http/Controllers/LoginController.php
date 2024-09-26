<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }
    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('home');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }
    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */     
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
    
        // Generate username acak dan unik
        $username = $this->generateUniqueUsername();
        
        // Hash password dan simpan user
        $user = User::create([
            'name' => $request->name,
            'username' => $username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password  
        ]);
    
        // Redirect atau respon setelah registrasi
        if ($user) {
            return redirect()->route('login')->with('success', 'Account created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create account');
        }
    }
    
    protected function generateUniqueUsername()
    {
        $username = fake()->unique()->userName(); // Menggunakan Faker untuk username acak
    
        while (User::where('username', $username)->exists()) {
            $username = fake()->unique()->userName(); // Generate ulang jika username sudah ada
        }
    
        return $username;
    }
    

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
