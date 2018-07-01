<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RatingController extends Controller
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
        $ratings = Rating::orderBy('id', 'DESC')->get();
        return view('admin.rating.rating', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rating.add-rating');
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
            'parcent' => 'required|integer',
        ]);
        $rating = new Rating();
        $rating->title = $request->title;
        $rating->parcent = $request->parcent;
        $rating->save();
        if ($rating) {
            Session::flash('message', 'Parcent Add Successfully!');
            return redirect(route('rating'));
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
        $edit = Rating::where('id', $id)->firstOrFail();
        return view('admin.rating.edit-rating', compact('edit'));
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
            'parcent' => 'required|integer',
        ]);
        $rating = Rating::findOrFail($id);
        $rating->title = $request->title;
        $rating->parcent = $request->parcent;
        $rating->save();
        if ($rating) {
            Session::flash('message', 'Parcent Add Successfully!');
            return redirect(route('rating'));
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
        $destroy = Rating::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'value');
            return redirect(route('rating'));
        }
    }
}
