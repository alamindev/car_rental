<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CopyRightController extends Controller
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
            if (DB::table('copyrights')->count()) {
                $edit = DB::table('copyrights')->first();
                return view('admin.copyright.socialdisable', compact('edit'));
            } else {
                return view('admin.copyright.social');
            }
        } catch (Exception $x) {
            return 'there are some problem';
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'copyright' => 'required',
        ]);
        $copyright = DB::table('copyrights')->insert([
            'copyright' => $request->copyright,
        ]);
        if ($copyright) {
            Session::flash('message', ' Copy Right Added SuccessFully!');
            return redirect(route('copyright'));
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
            'copyright' => 'required',
        ]);
        $copyright = DB::table('copyrights')->where('id', $request->id)->update([
            'copyright' => $request->copyright,
        ]);
        if ($copyright) {
            Session::flash('update', ' Copy Right update SuccessFully!');
            return back();
        } else {
            Session::flash('error', 'No Change found');
            return back();
        }
    }
}
