<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SocialController extends Controller
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
            if (Social::count()) {
                $social = Social::get();
                return view('admin.social.socialdisable', compact('social'));
            } else {
                $social = Social::get();
                return view('admin.social.social', compact('social'));
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
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'google' => 'required',
            'youtube' => 'required',
        ]);
        $social = new Social();
        $social->facebook = $request->facebook;
        $social->twitter = $request->twitter;
        $social->linkedin = $request->linkedin;
        $social->google = $request->google;
        $social->youtube = $request->youtube;
        $social->save();
        if ($social) {
            Session::flash('message', 'Social link Added SuccessFully!');
            return redirect(route('social'));
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
        $social_show = Social::where('id', $id)->firstOrFail();
        return view('admin.social.social-view', compact('social_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Social::where('id', $id)->firstOrFail();
        $social = Social::get();
        return view('admin.social.social-edit', compact('edit', 'social'));
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
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'google' => 'required',
            'youtube' => 'required',
        ]);
        $social = Social::findOrFail($id);
        $social->facebook = $request->facebook;
        $social->twitter = $request->twitter;
        $social->linkedin = $request->linkedin;
        $social->google = $request->google;
        $social->youtube = $request->youtube;
        $social->save();
        if ($social) {
            Session::flash('message', 'Social link Added SuccessFully!');
            return redirect(route('social'));
        }
    }

}
