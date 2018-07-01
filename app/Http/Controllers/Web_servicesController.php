<?php

namespace App\Http\Controllers;

use App\Services;

class Web_servicesController extends Controller
{

    public function index()
    {
        $services = Services::where('deleted_at', null)->orderBy('id', 'DESC')->get();
        return view('website.services.services', compact('services'));
    }

    public function show($id)
    {
        $service = Services::where('deleted_at', null)->where('id', $id)->first();
        return view('website.services.service_details', compact('service'));
    }

}
