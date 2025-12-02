<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showWelcome()
    {
        return view('welcome');
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
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'password' => 'required|string'
        ]);

        // find user by the id field (adjust column name if necessary)
        $user = User::where('id', $request->input('id'))->first();

        if (!$user) {
            return back()->withErrors([
                'id' => 'User ID is incorrect.',
            ]);
        }

        // check password against the stored hash
        if (!Hash::check($request->input('password'), $user->password)) {
            return back()->withErrors([
                'password' => 'Password is incorrect.',
            ]);
        }

        // credentials OK — log the user in
        Auth::login($user);

        return redirect('/welcome');
    }

    public function register(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric|unique:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = new User();
        $user->id = $request->input('id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::login($user);

        return redirect('/welcome');
    }
}
