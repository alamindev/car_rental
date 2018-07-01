<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FacilityController extends Controller
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
        $facilities = Facility::where('deleted_at', null)->orderBy('id', 'DESC')->get();
        return view('admin.facility.facilities', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facility.add-facility');
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
            'title' => 'required',
            'icon' => 'required',
            'detail' => 'required',
        ]);
        $facility = new Facility();
        $facility->title = $request->title;
        $facility->icon = $request->icon;
        $facility->detail = $request->detail;
        $facility->save();
        if ($facility) {
            Session::flash('message', 'facility Uploaded SuccessFully!');
            return redirect(route('facilities'));
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
        $facility = Facility::where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.facility.show-facility', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Facility::where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.facility.edit-facility', compact('edit'));
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
            'title' => 'required',
            'icon' => 'required',
            'detail' => 'required',
        ]);
        $facility = Facility::findOrFail($id);
        $facility->title = $request->title;
        $facility->icon = $request->icon;
        $facility->detail = $request->detail;
        $facility->save();
        if ($facility) {
            Session::flash('message', 'Facility Updated SuccessFully!');
            return redirect(route('facilities'));
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
        $destroy = Facility::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'value');
            return redirect(route('facilities'));
        }
    }
}
