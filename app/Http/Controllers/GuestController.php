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
    //Add auto gather info after allowing location access
    public function showreport() {
        return view('guests.reports.report');
    }

    public function firereport() {
        // Add soon: should return with the geolcation infos
        return view('guests.reports.firereport');
    }
    public function accidentreport() {
        // Add soon: should return with the geolcation infos
        return view('guests.reports.firereport');
    }
    public function floodreport() {
        // Add soon: should return with the geolcation infos
        return view('guests.reports.firereport');
    }
    public function crimereport() {
        // Add soon: should return with the geolcation infos
        return view('guests.reports.firereport');
    }

}
