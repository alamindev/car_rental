<?php

namespace App\Http\Controllers;

use App\Branch;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $branchs = Branch::where('deleted_at', '=', null)->orderBy('id', 'DESC')->get();
        return view('admin.branch.branch')->with('branchs', $branchs);
    }

    public function Create()
    {
        $cities = City::orderBy('id', 'DESC')->get();
        return view('admin.branch.add-branch', compact('cities'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);
        $branch = new Branch();
        $branch->branch_name = $request->name;
        $branch->email = $request->email;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->city_id = $request->city;
        $branch->save();
        if ($branch) {
            Session::flash('success', 'value');
            return redirect(route('branch'));
        }
    }

    public function view($id)
    {
        $view = Branch::with('city')->where('deleted_at', '=', null)->where('id', $id)->firstOrFail();
        return view('admin.branch.view-branch', compact('view'));
    }

    public function edit($id)
    {
        $edit = Branch::with('city')->where('deleted_at', '=', null)->where('id', $id)->firstOrFail();
        $cities = City::orderBy('id', 'DESC')->get();
        return view('admin.branch.edit-branch', compact('edit', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);
        $branch = Branch::findOrFail($id);
        $branch->branch_name = $request->name;
        $branch->email = $request->email;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->city_id = $request->city;
        $branch->save();
        if ($branch) {
            Session::flash('success', 'value');
            return redirect(route('branch'));
        }
    }

    public function destroy($id)
    {
        $destroy = Branch::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'value');
            return redirect(route('branch'));
        }
    }
}
