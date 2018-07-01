<?php

namespace App\Http\Controllers;

use App\Capacity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CapacityController extends Controller
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
        $capacities = Capacity::orderby('id', 'DESC')->get();
        return view('admin.capacity.capacity', compact('capacities'));
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
            'capacity' => 'required',
        ]);
        $capacity = new Capacity();
        $capacity->cap_name = $request->capacity;
        $capacity->save();
        if ($capacity) {
            Session::flash('message', 'Car Capacity add SuccessFully!');
            return redirect(route('capacity'));
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
        $edit = Capacity::findOrFail($id)->first();
        return view('admin.capacity.capacity-edit', compact('edit'));
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
            'capacity' => 'required',
        ]);
        $capacity = Capacity::findOrFail($id);
        $capacity->cap_name = $request->capacity;
        $capacity->save();
        if ($capacity) {
            Session::flash('message', 'Car Capacity Updated SuccessFully!');
            return redirect(route('capacity'));
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
        $destroy = Capacity::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('capacity'));
        }
    }
}
