<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facade\Auth;

class ProfileController extends Controller
{
    public function index() {

        $user = Auth::user();
        return view('users.profile.index', compact('user'));
    }
}
