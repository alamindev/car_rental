<?php

namespace App\Http\Controllers;

use App\Facility;

class Web_facilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::where('deleted_at', null)->orderBy('id', 'DESC')->get();
        return view('website.facility.facilities', compact('facilities'));
    }

    public function show($id)
    {
        $facility = Facility::where('deleted_at', null)->where('id', $id)->first();
        return view('website.facility.facility_details', compact('facility'));
    }
}
