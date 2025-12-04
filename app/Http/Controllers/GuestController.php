<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;


class GuestController extends Controller
{
    public function reverseGeocode(Request $request) {
        // $lat = $request->lat;
        // $lng = $request->lng;

        // $url = 'https://www.googleapis.com/geolocation/v1/geolocate';
        // $data = json_decode(file_get_contents($url), true);

        // return response()->json([
        //     'address' => $data['display_name'] ?? 'Unknown location',
        // ]);
        // Will review HTML5 Geolocation API to be implemented later
    }

    public function showLogin () {
        return view('users.login');
    }
    
    public function showRegister() {
        return view('guests.register');
    }
    
    public function showreport() {
        return view('guests.reports.report');
    }

    public function showFireReport() {
        return view('guests.reports.firereport');
    }

    public function submitFireReport(Request $request) {
        return $this->saveReport($request, 'fire');
    }

    public function showFloodReport() {
        return view('guests.reports.floodreport');
    }

    public function submitFloodReport(Request $request) {
        return $this->saveReport($request, 'flood');
    }

    public function showCrimeReport() {
        return view('guests.reports.crimereport');
    }

    public function submitCrimeReport(Request $request) {
        return $this->saveReport($request, 'crime');
    }

    public function showAccidentReport() {
        return view('guests.reports.accidentreport');
    }
    
    public function submitAccidentReport(Request $request) {
        return $this->saveReport($request, 'accident');
    }

    private function saveReport(Request $request, $type) {
        $request->validate([
            'description' => 'nullable|string',
            'media'       => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:20480',
        ]);

        $path = null;
        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('reports', 'public');
        }

        Report::create([
            'report_type' => $type,
            'location' => $request->location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'datetime' => $request->datetime,
            'description' => $request->description,
            'media_path' => $path,
            'user_id' => auth()->id() ?? null,
        ]);

        return back()->with('success', 'Report has been submitted!');
    }

}
