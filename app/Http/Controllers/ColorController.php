<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
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
        $colors = Color::orderby('id', 'DESC')->get();
        return view('admin.color.color', compact('colors'));
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
            'color' => 'required',
        ]);
        $color = new Color();
        $color->color_name = $request->color;
        $color->save();
        if ($color) {
            Session::flash('message', 'Car Color add SuccessFully!');
            return redirect(route('color'));
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
        $edit = Color::findOrFail($id)->first();
        return view('admin.color.color-edit', compact('edit'));
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
            'color' => 'required',
        ]);
        $color = Color::findOrFail($id);
        $color->color_name = $request->color;
        $color->save();
        if ($color) {
            Session::flash('message', 'Car Color Updated SuccessFully!');
            return redirect(route('color'));
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
        $destroy = Color::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('color'));
        }
    }
}
