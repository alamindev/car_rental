<?php

namespace App\Http\Controllers;

use App\Choose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChooseController extends Controller
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
        try {
            if (Choose::count()) {
                $edit = Choose::first();
                return view('admin.choose_us.edit-choose', compact('edit'));
            } else {
                return view('admin.choose_us.choose');
            }
        } catch (Exception $x) {
            return 'there are some problem';
        }
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
            'detail' => 'required',
        ]);
        $choose = new Choose();
        $choose->title = $request->title;
        $choose->detail = $request->detail;
        $choose->save();
        if ($choose) {
            Session::flash('message', 'value');
            return redirect(route('choose'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
        ]);
        $choose = Choose::find($request->id);
        $choose->title = $request->title;
        $choose->detail = $request->detail;
        $choose->save();
        if ($choose) {
            Session::flash('update', 'value');
            return redirect(route('choose'));
        }
    }

}
