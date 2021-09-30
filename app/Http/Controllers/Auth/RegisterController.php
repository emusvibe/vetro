<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
   
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        
        //dd($request->only('email', 'password'));
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),

        ]);

         auth()->attempt($request->only('email', 'password'));
         return redirect()->route('dashboard');
        }
}
 