<?php

namespace App\Http\Controllers;

use App\car;
use App\Feature;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeatureController extends Controller
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
        $features = Feature::where('deleted_at', null)->orderBy('id', 'DESC')->get();
        return view('admin.feature.features', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::where('deleted_at', null)->where('feature', 1)->get();
        return view('admin.feature.add-feature', compact('cars'));
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
            "car_id" => 'required',
            "feature_1" => 'required',
            "feature_2" => 'required',
        ]);
        $feature = new Feature();
        $feature->car_id = $request->car_id;
        $feature->feature_1 = $request->feature_1;
        $feature->feature_2 = $request->feature_2;
        $feature->feature_3 = $request->feature_3;
        $feature->feature_4 = $request->feature_4;
        $feature->feature_5 = $request->feature_5;
        $feature->feature_6 = $request->feature_6;
        $feature->feature_7 = $request->feature_7;
        $feature->feature_8 = $request->feature_8;
        $feature->save();
        DB::table('cars')->where('id', $request->car_id)->update(['feature' => 0]);
        if ($feature) {
            Session::flash('message', 'feature Uploaded SuccessFully!');
            return redirect(route('features'));
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feature = Feature::with('cars')->where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.feature.show-feature', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars = Car::where('deleted_at', null)->get();
        $edit = Feature::where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.feature.edit-feature', compact('cars', 'edit'));
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
            "car_id" => 'required',
            "feature_1" => 'required',
            "feature_2" => 'required',
        ]);
        $feature = Feature::findOrFail($id);
        $feature->car_id = $request->car_id;
        $feature->feature_1 = $request->feature_1;
        $feature->feature_2 = $request->feature_2;
        $feature->feature_3 = $request->feature_3;
        $feature->feature_4 = $request->feature_4;
        $feature->feature_5 = $request->feature_5;
        $feature->feature_6 = $request->feature_6;
        $feature->feature_7 = $request->feature_7;
        $feature->feature_8 = $request->feature_8;
        $feature->save();
        if ($feature) {
            Session::flash('message', 'feature Updated SuccessFully!');
            return redirect(route('features'));
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
        $destroy = Feature::findOrFail($id)->delete();
        DB::table('cars')->where('id', $id)->update(['feature' => 1]);
        if ($destroy) {
            Session::flash('delete', 'value');
            return redirect(route('features'));
        }
    }
}
