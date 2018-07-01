<?php

namespace App\Http\Controllers;

use App\LogoTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class LogoTitleController extends Controller
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
            if (LogoTitle::count()) {
                $logoTitle = LogoTitle::where('deleted_at', null)->get();
                return view('admin.logo&title.logotitledisable', compact('logoTitle'));
            } else {
                $logoTitle = LogoTitle::where('deleted_at', null)->get();
                return view('admin.logo&title.logotitle', compact('logoTitle'));
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
        $fileName = $this->uploadLogo($request);
        $this->validate($request, [
            'title' => 'required',
            'logo' => 'required | mimes:jpeg,jpg,png',
        ]);
        $logoTitle = new LogoTitle();
        $logoTitle->title = $request->title;
        $logoTitle->logo = $fileName;
        $logoTitle->save();
        if ($logoTitle) {
            Session::flash('message', 'Logo and title Uploaded SuccessFully!');
            return redirect(route('logoandtitle'));
        }
    }

    public function uploadLogo($request)
    {
        if ($request->hasFile('logo')) {
            $picture = $request->file('logo');
            $images = Image::make($picture);
            $images->resize(500, 380, function ($constrain) {
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_logo_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/logo/' . $fileName);
            return $fileName;
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
        $logoTitleShow = LogoTitle::where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.logo&title.view-detail-logo', compact('logoTitleShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = LogoTitle::where('deleted_at', null)->where('id', $id)->firstOrFail();
        $logoTitle = LogoTitle::where('deleted_at', null)->get();
        return view('admin.logo&title.edit-logo', compact('edit', 'logoTitle'));
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
        $fileName = $this->updateLogo($request, $id);
        $this->validate($request, [
            'title' => 'required',
            'logo' => 'mimes:jpeg,jpg,png',
        ]);
        $logoTitle = LogoTitle::find($id);
        $logoTitle->title = $request->title;
        $logoTitle->logo = $fileName;
        $logoTitle->save();
        if ($logoTitle) {
            Session::flash('message', 'Logo and title update SuccessFully!');
            return redirect(route('logoandtitle'));
        }
    }
    public function updateLogo($request, $id)
    {
        $logotitle = LogoTitle::where('id', $id)->first();
        if ($request->hasFile('logo')) {
            $file_path = $logotitle->logo;
            $storage_path = 'uploads/logo/' . $file_path;
            if (\File::exists($storage_path)) {
                unlink($storage_path);
            }
            $picture = $request->file('logo');
            $images = Image::make($picture);
            $images->resize(500, 380, function ($constrain) {
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_logo_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/logo/' . $fileName);
        } else {
            $fileName = $logotitle['logo'];
        }
        return $fileName;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = LogoTitle::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('logoandtitle'));
        }
    }
}
