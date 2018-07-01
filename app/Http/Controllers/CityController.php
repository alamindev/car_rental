<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderby('id', 'DESC')->get();
        return view('admin.city.city', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            'post_code' => 'required',
        ]);
        $city = new City();
        $city->city_name = $request->city;
        $city->postal_code = $request->post_code;
        $city->save();
        if ($city) {
            Session::flash('message', 'City add SuccessFully!');
            return redirect(route('city'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = City::where('id', $id)->first();
        return view('admin.city.city-edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'city' => 'required',
            'post_code' => 'required',
        ]);
        $city = City::findOrFail($id);
        $city->city_name = $request->city;
        $city->postal_code = $request->post_code;
        $city->save();
        if ($city) {
            Session::flash('message', 'City Updated SuccessFully!');
            return redirect(route('city'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = City::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('city'));
        }
    }
}
