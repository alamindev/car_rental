<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ReviewController extends Controller
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
        $reviews = Review::orderBy('id', 'DESC')->get();
        return view('admin.review.reviews', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.add-review');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = $this->uploadReview($request);
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'photo' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);
        $review = new Review();
        $review->title = $request->title;
        $review->detail = $request->detail;
        $review->photo = $fileName;
        $review->name = $request->name;
        $review->address = $request->address;
        $review->save();
        if ($review) {
            Session::flash('message', 'Review Added SuccessFully!');
            return redirect(route('reviews'));
        }
    }
    public function uploadReview($request)
    {
        if ($request->hasFile('photo')) {
            $picture = $request->file('photo');
            $images = Image::make($picture);
            $images->resize(500, 600, function ($constrain) {
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_review_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/review/' . $fileName);
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
        $review = Review::where('id', $id)->firstOrFail();
        return view('admin.review.show-review', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Review::where('id', $id)->firstOrFail();
        return view('admin.review.edit-review', compact('edit'));
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
            'title' => 'required',
            'detail' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);
        $review = Review::findOrFail($id);
        $review->title = $request->title;
        $review->detail = $request->detail;
        $review->photo = $fileName;
        $review->name = $request->name;
        $review->address = $request->address;
        $review->save();
        if ($review) {
            Session::flash('message', 'Review updated SuccessFully!');
            return redirect(route('reviews'));
        }
    }
    public function updatePhoto($request, $id)
    {
        $review = Review::where('id', $id)->first();
        if ($request->hasFile('photo')) {
            $file_path = $review->photo;
            $storage_path = 'uploads/review/' . $file_path;
            if (\File::exists($storage_path)) {
                unlink($storage_path);
            }
            $picture = $request->file('photo');
            $images = Image::make($picture);
            $images->resize(500, 600, function ($constrain) {
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_review_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/review/' . $fileName);
        } else {
            $fileName = $review['photo'];
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
        $destroy = Review::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'value');
            return redirect(route('reviews'));
        }
    }
}
