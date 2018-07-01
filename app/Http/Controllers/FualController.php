<?php

namespace App\Http\Controllers;

use App\Fual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FualController extends Controller
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
        $fuals = Fual::orderby('id', 'DESC')->get();
        return view('admin.fual.fual', compact('fuals'));
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
            'fual' => 'required',
        ]);
        $fual = new Fual();
        $fual->fual_name = $request->fual;
        $fual->save();
        if ($fual) {
            Session::flash('message', 'Car Fual add SuccessFully!');
            return redirect(route('fual'));
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
        $edit = Fual::findOrFail($id)->first();
        return view('admin.fual.fual-edit', compact('edit'));
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
            'fual' => 'required',
        ]);
        $fual = Fual::findOrFail($id);
        $fual->fual_name = $request->fual;
        $fual->save();
        if ($fual) {
            Session::flash('message', 'Car fual Updated SuccessFully!');
            return redirect(route('fual'));
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
        $destroy = Fual::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('fual'));
        }
    }
}
