<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class VideoController extends Controller
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
            if (Video::count()) {
                $edit = Video::first();
                return view('admin.video.edit-video', compact('edit'));
            } else {
                return view('admin.video.video');
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
        $fileName = $this->uploadVideo($request);
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'photo' => 'required',
            'link' => 'required',
        ]);
        $video = new Video();
        $video->title = $request->title;
        $video->subtitle = $request->subtitle;
        $video->photo = $fileName;
        $video->link = $request->link;
        $video->save();
        if ($video) {
            Session::flash('message', 'Video Added SuccessFully!');
            return redirect(route('videos'));
        }
    }
    public function uploadVideo($request)
    {
        if ($request->hasFile('photo')) {
            $picture = $request->file('photo');
            $images = Image::make($picture);
            $images->resize(1400, 1000, function ($constrain) {
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_video_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/video/' . $fileName);
            return $fileName;
        }
    }

    public function update(Request $request)
    {
        $fileName = $this->updatePhoto($request);
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'link' => 'required',
        ]);
        $video = Video::findOrFail($request->id);
        $video->title = $request->title;
        $video->subtitle = $request->subtitle;
        $video->photo = $fileName;
        $video->link = $request->link;
        $video->save();
        if ($video) {
            Session::flash('message', 'video updated SuccessFully!');
            return redirect(route('videos'));
        }
    }
    public function updatePhoto($request)
    {
        $video = Video::where('id', $request->id)->first();
        if ($request->hasFile('photo')) {
            $file_path = $video->photo;
            $storage_path = 'uploads/video/' . $file_path;
            if (\File::exists($storage_path)) {
                unlink($storage_path);
            }
            $picture = $request->file('photo');
            $images = Image::make($picture);
            $images->resize(1400, 1000, function ($constrain) {
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_video_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/video/' . $fileName);
        } else {
            $fileName = $video['photo'];
        }
        return $fileName;
    }
}
