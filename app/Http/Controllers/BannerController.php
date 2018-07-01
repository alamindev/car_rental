<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
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
        $banner = Banner::where('deleted_at', null)->get();
        return view('admin.banner.banner', compact('banner'));
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
            'banner' => 'required | mimes:jpeg,jpg,png',
        ]);
        $banner = new Banner();
        $banner->banner = $fileName;
        $banner->save();
        if ($banner) {
            Session::flash('message', 'Banner Uploaded SuccessFully!');
            return redirect(route('banner'));
        }
    }
    public function uploadLogo($request)
    {
        if ($request->hasFile('banner')) {
            $picture = $request->file('banner');
            $images = Image::make($picture);
            $images->resize(1380, 350, function ($constrain) {
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_banner_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/banner/' . $fileName);
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
        $bannershow = Banner::where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.banner.banner-view', compact('bannershow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Banner::where('deleted_at', null)->where('id', $id)->firstOrFail();
        $banner = Banner::where('deleted_at', null)->get();
        return view('admin.banner.banner-edit', compact('edit', 'banner'));
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
            'banner' => 'required | mimes:jpeg,jpg,png',
        ]);
        $logoTitle = Banner::find($id);
        $logoTitle->banner = $fileName;
        $logoTitle->save();
        if ($logoTitle) {
            Session::flash('message', 'Logo and title update SuccessFully!');
            return redirect(route('banner'));
        }
    }
    public function updateLogo($request, $id)
    {
        $banner = Banner::where('id', $id)->first();
        if ($request->hasFile('banner')) {
            $file_path = $banner->banner;
            $storage_path = 'uploads/banner/' . $file_path;
            if (\File::exists($storage_path)) {
                unlink($storage_path);
            }
            $picture = $request->file('banner');
            $images = Image::make($picture);
            $images->resize(100, 130, function ($constrain) {
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_banner_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/banner/' . $fileName);
        } else {
            $fileName = $banner['banner'];
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
        $destroy = banner::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('banner'));
        }
    }
}
