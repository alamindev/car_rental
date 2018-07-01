<?php

namespace App\Http\Controllers;

use App\Privacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PrivacyController extends Controller
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
            if (Privacy::count()) {
                $edit = Privacy::first();
                return view('admin.privacy.edit-privacy', compact('edit'));
            } else {
                return view('admin.privacy.privacy');
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
        $privacy = new Privacy();
        $privacy->title = $request->title;
        $privacy->detail = $request->detail;
        $privacy->save();
        if ($privacy) {
            Session::flash('message', 'value');
            return redirect(route('privacy'));
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
        $privacy = Privacy::find($request->id);
        $privacy->title = $request->title;
        $privacy->detail = $request->detail;
        $privacy->save();
        if ($privacy) {
            Session::flash('update', 'value');
            return redirect(route('privacy'));
        }
    }

}
