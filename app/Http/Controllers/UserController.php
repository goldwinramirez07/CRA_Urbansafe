<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ], [
            'email.unique' => 'This email is already registered.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        $user->sendEmailVerificationNotification();
        
        Auth::login($user);
        return redirect()->route('verification.notice');
    }

    public function userLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){ 
            $request->session()->regenerate();

            if (Auth::user()->role === "admin") {
                return redirect('/index');
            } else {
                return redirect('/user/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile() {
        return view('users.profile.view');
    }
    
}
