<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Success!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('user_id', $request->user_id)->first();

        if (!$user) {
            return back()->withErrors([
                'id' => 'User ID is incorrect.',
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password is incorrect.',
            ]);
        }

        Auth::login($user);
        return redirect()->route('home')->with('success', 'Login Success!');
    }

    public function register(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric|unique:users,user_id',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255',
            'password' => 'required|string|confirmed|min:8|regex:/[A-Z]/|regex:/[0-9]/',
        ], [
            'user_id.unique' => 'This ID is already taken.',
            'email.email' => 'Please enter a valid email address.',
            'password.confirmed' => 'Passwords do not match.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one uppercase letter and one number.',
        ]);

        User::create([
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account Created!');
    }


    
    public function attendance()
    {
        return view('attendance');
    }
}
