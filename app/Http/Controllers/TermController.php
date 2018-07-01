<?php

namespace App\Http\Controllers;

use App\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TermController extends Controller
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
            if (Term::count()) {
                $edit = Term::first();
                return view('admin.term&condition.edit-term', compact('edit'));
            } else {
                return view('admin.term&condition.term');
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
        $term = new Term();
        $term->title = $request->title;
        $term->detail = $request->detail;
        $term->save();
        if ($term) {
            Session::flash('message', 'value');
            return redirect(route('term'));
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
        $term = Term::find($request->id);
        $term->title = $request->title;
        $term->detail = $request->detail;
        $term->save();
        if ($term) {
            Session::flash('update', 'value');
            return redirect(route('term'));
        }
    }

}
