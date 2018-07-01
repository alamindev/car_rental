<?php

namespace App\Http\Controllers;

use App\Brand;
use App\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ModelController extends Controller
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
        $models = CarModel::with("brand")->orderby('id', 'DESC')->get();
        $brands = Brand::where('deleted_at', null)->orderby('id', 'DESC')->get();
        return view('admin.model.model', compact('models', 'brands'));
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
            'model' => 'required',
            'brand' => 'required',
        ]);
        $carmodel = new CarModel();
        $carmodel->model_name = $request->model;
        $carmodel->brand_id = $request->brand;
        $carmodel->save();
        if ($carmodel) {
            Session::flash('message', 'Car Model add SuccessFully!');
            return redirect(route('model'));
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
        $edit = CarModel::findOrFail($id)->first();
        $brands = Brand::where('deleted_at', null)->orderby('id', 'DESC')->get();
        return view('admin.model.model-edit', compact('edit', 'brands'));
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
            'model' => 'required',
            'brand' => 'required',
        ]);
        $carmodel = CarModel::find($id);
        $carmodel->model_name = $request->model;
        $carmodel->brand_id = $request->brand;
        $carmodel->save();
        if ($carmodel) {
            Session::flash('message', 'Car Model Updated SuccessFully!');
            return redirect(route('model'));
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
        $destroy = CarModel::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('model'));
        }
    }
}
