<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Storage;

class ServiceController extends Controller
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
        $services = Services::where('deleted_at', null)->orderBy('id', 'DESC')->get();
        return view('admin.service.services', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.add-service');
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
        $service = new Services();
        $service->title = $request->title;
        $service->icon = $request->icon;
        $service->detail = $request->detail;
        $service->save();
        if ($service) {
            Session::flash('message', 'service Add SuccessFully!');
            return redirect(route('services'));
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
        $service = Services::where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.service.show-service', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Services::where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.service.edit-service', compact('edit'));
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
        $service = Services::findOrFail($id);
        $service->title = $request->title;
        $service->icon = $request->icon;
        $service->detail = $request->detail;
        $service->save();
        if ($service) {
            Session::flash('message', 'service Updated SuccessFully!');
            return redirect(route('services'));
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
        $destroy = Services::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'value');
            return redirect(route('services'));
        }
    }
}
