<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Branch;
use App\Car;
use App\CarModel;
use App\Choose;
use App\Contact;
use App\Facility;
use App\Rating;
use App\Review;
use App\Services;
use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $facilities = Facility::where('deleted_at', null)->orderBy('id', 'DESC')->limit(6)->get();
        $service_one = Services::where('deleted_at', null)->orderBy('id', 'ASC')->limit(2)->get();
        $service_two = Services::where('deleted_at', null)->orderBy('id', 'DESC')->limit(2)->get();
        $cars = Car::with('car_feature', 'categories')->where('deleted_at', null)->orderBy('id', 'DESC')->limit(3)->get();
        $banners = Banner::where('deleted_at', null)->orderBy('id', 'DESC')->limit(3)->get();
        $choose = Choose::first();
        $ratings = Rating::orderBy('id', 'DESC')->limit(3)->get();
        $reviews = Review::orderBy('id', 'DESC')->limit(6)->get();
        $video = Video::first();
        $contact = Contact::first();
        $models = CarModel::select('id', 'model_name')->get();
        $branches = Branch::select('id', 'branch_name')->get();
        return view('website.home.index', compact('facilities', 'service_one', 'service_two', 'cars', 'banners', 'choose', 'ratings', 'reviews', 'video', 'contact', 'models', 'branches'));
    }
    // coding for search
    public function search(Request $request)
    {
        $this->validate($request, [
            'car_model' => 'required',
            'pickupLocation' => 'required',
            'returnLocation' => 'required',
            'pickupDate' => 'required',
            'returnDate' => 'required',
        ]);
        $cars = Car::with('reservation', 'car_feature', 'categories')->where('model_id', $request->car_model)->where('branch_id', $request->pickupLocation)->where('branch_id', $request->returnLocation)->whereDoesntHave('reservation', function ($q) {
            $q->where('pickupDate', '<>', '$request->pickupDate')
                ->where('returnDate', '<>', '$request->returnDate');
        })->get();
        if ($cars) {
            return view('website.car.car', compact('cars'));
        } else {
            $error = "No Car Found";
            return view('website.car.car', compact('error'));
        }

    }
}
