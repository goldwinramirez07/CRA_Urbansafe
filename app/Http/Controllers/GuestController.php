<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class GuestController extends Controller
{
    public function showLogin () {
        return view('users.login');
    }
    
    public function showRegister() {
        return view('guests.register');
    }

    //Report
    public function makereport() {
        return view('');
    }

    
}
