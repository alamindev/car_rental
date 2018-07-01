<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
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
            if (!About::count()) {
                return view('admin.about.add-about');
            } else {
                $about = About::firstOrFail();
                return view('admin.about.about', compact('about'));
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
        $fileName = $this->uploadPhoto($request);
        $this->validate($request, [
            'detail' => 'required',
            'photo' => 'required | mimes:jpeg,jpg,png',
        ]);
        $about = new About();
        $about->title = $request->title;
        $about->photo = $fileName;
        $about->detail = $request->detail;
        $about->save();
        if ($about) {
            Session::flash('message', 'About Info Uploaded SuccessFully!');
            return redirect(route('about'));
        }
    }
    public function uploadPhoto($request)
    {
        if ($request->hasFile('photo')) {
            $picture = $request->file('photo');
            $images = Image::make($picture);
            $fileName = pathinfo('_about_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/about/' . $fileName);
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
        $about_show = About::where('id', $id)->firstOrFail();
        return view('admin.about.show-about', compact('about_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = About::where('id', $id)->firstOrFail();
        return view('admin.about.edit-about', compact('edit'));
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
        $fileName = $this->updatePhoto($request, $id);
        $this->validate($request, [
            'detail' => 'required',
            'photo' => 'mimes:jpeg,jpg,png',
        ]);
        $about = About::find($id);
        $about->title = $request->title;
        $about->photo = $fileName;
        $about->detail = $request->detail;
        $about->save();
        if ($about) {
            Session::flash('message', 'update Uploaded SuccessFully!');
            return redirect(route('about'));
        } else {
            Session::flash('message', 'You have no change');
            return redirect(route('about'));
        }
    }
    public function updatePhoto($request, $id)
    {
        $post = About::where('id', $id)->firstOrFail();
        if ($request->hasFile('photo')) {
            $path_info = $post->photo;
            $storage_path = 'uploads/about/' . $path_info;
            if (\File::exists($storage_path)) {
                unlink($storage_path);
            }
            $picture = $request->file('photo');
            $images = Image::make($picture);
            $fileName = pathinfo('_about_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/about/' . $fileName);

        } else {
            $fileName = $post['photo'];
        }
        return $fileName;
    }
}
