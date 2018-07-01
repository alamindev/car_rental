<?php

namespace App\Http\Controllers;

use App\Car;

class Web_carController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('car_feature', 'categories')->where('deleted_at', null)->orderBy('id', 'DESC')->get();
        return view('website.car.car', compact('cars'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::with('car_feature', 'categories', 'car_model', 'fuals', 'colors', 'branches', 'capacities')->where('deleted_at', null)->where('id', $id)->first();
        return view('website.car.car_details', compact('car'));
    }

}
