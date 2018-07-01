<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserInfoController extends Controller
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
        $user_info = UserInfo::where('deleted_at', null)->orderBy('updated_at', 'DESC')->get();
        return view('admin.user_info.user-info', compact('user_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_info.add-user-info');
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
        $user_info = new UserInfo();
        $user_info->title = $request->title;
        $user_info->subject = $request->subject;
        $user_info->details = $request->detail;
        $user_info->save();
        if ($user_info) {
            Session::flash('message', 'user information Uploaded SuccessFully!');
            return redirect(route('user_info'));
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
        $user_info = UserInfo::where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.user_info.show-user-info', compact('user_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = UserInfo::where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.user_info.edit-user-info', compact('edit'));
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
            'detail' => 'required',
        ]);
        $update = UserInfo::findOrFail($id);
        $update->title = $request->title;
        $update->subject = $request->subject;
        $update->details = $request->detail;
        $update->save();
        if ($update) {
            Session::flash('message', 'update Uploaded SuccessFully!');
            return redirect(route('user_info'));
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
        $destroy = UserInfo::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'value');
            return redirect(route('user_info'));
        }
    }
}
