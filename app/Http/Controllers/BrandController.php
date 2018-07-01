<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
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
        $brand = Brand::where('deleted_at', null)->orderby('id', 'DESC')->get();
        return view('admin.brand.brand', compact('brand'));
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
            'brand' => 'required',
        ]);
        $brand = new Brand();
        $brand->brand_name = $request->brand;
        $brand->save();
        if ($brand) {
            Session::flash('message', 'brand add SuccessFully!');
            return redirect(route('brand'));
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
        $brand = Brand::where('deleted_at', null)->orderby('id', 'DESC')->get();
        $edit = Brand::where('deleted_at', null)->where('id', $id)->first();
        return view('admin.brand.brand-edit', compact('edit', 'brand'));
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
            'brand' => 'required',
        ]);
        $brand = Brand::findOrFail($id);
        $brand->brand_name = $request->brand;
        $brand->save();
        if ($brand) {
            Session::flash('update', 'Brand Updated SuccessFully!');
            return redirect(route('brand'));
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
        $destroy = Brand::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('brand'));
        }
    }
}
