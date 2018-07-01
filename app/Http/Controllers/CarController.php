<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Capacity;
use App\Car;
use App\CarModel;
use App\Category;
use App\Color;
use App\Fual;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CarController extends Controller
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
        $cars = Car::with('car_model')->where('deleted_at', null)->orderby('id', 'DESC')->get();
        return view('admin.car.cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = CarModel::get();
        $branches = Branch::get();
        $categories = Category::get();
        $fuals = Fual::get();
        $colors = Color::get();
        $capacities = Capacity::get();
        return view('admin.car.add-car', compact('models', 'branches', 'categories', 'fuals', 'colors', 'capacities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = $this->upload($request);
        $this->validate($request, [
            'title' => 'required',
            'car_name' => 'required',
            'model' => 'required',
            'branch' => 'required',
            'category' => 'required',
            'fual' => 'required',
            'color' => 'required',
            'capacity' => 'required',
            'isAuto' => 'required',
            'photo' => 'required|mimes:png',
            'hourly_pack' => 'required|numeric',
            'daily_pack' => 'numeric',
            'monthly_pack' => 'numeric',
            'date' => 'required',
        ]);
        $car = Car::insert([
            'title' => $request['title'],
            'car_name' => $request['car_name'],
            'car_details' => $request['car_details'],
            'model_id' => $request['model'],
            'branch_id' => $request['branch'],
            'category_id' => $request['category'],
            'year' => $request['year'],
            'fual_id' => $request['fual'],
            'color_id' => $request['color'],
            'capacity_id' => $request['capacity'],
            'isAuto' => $request['isAuto'],
            'registration' => $request['reg_no'],
            'miniAge' => $request['age'],
            'picture' => $fileName,
            'price_per_hour' => $request['hourly_pack'],
            'price_per_day' => $request['daily_pack'],
            'price_per_month' => $request['monthly_pack'],
            'date' => $request['date'],
            'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString(),
        ]);
        if ($car) {
            Session::flash('message', 'New Car added SuccessFully!');
            return redirect(route('cars'));
        }

    }

    // for upload picture
    public function upload($request)
    {
        if ($request->hasFile('photo')) {
            $picture = $request->file('photo');
            $images = Image::make($picture);
            $images->crop(700, 380);
            $fileName = pathinfo('_car_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/car/' . $fileName);
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
        $view = Car::with('car_model', 'colors', 'fuals', 'categories', 'capacities', 'branches')->where('id', $id)->firstOrFail();
        return view('admin.car.view-car', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $models = CarModel::get();
        $branches = Branch::get();
        $categories = Category::get();
        $fuals = Fual::get();
        $colors = Color::get();
        $capacities = Capacity::get();
        $edit = Car::where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.car.edit-car', compact('models', 'branches', 'categories', 'fuals', 'colors', 'capacities', 'edit'));
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
            'car_name' => 'required',
            'model' => 'required',
            'branch' => 'required',
            'category' => 'required',
            'fual' => 'required',
            'color' => 'required',
            'capacity' => 'required',
            'isAuto' => 'required',
            'hourly_pack' => 'required',
            'date' => 'required',
        ]);
        $car = Car::findOrFail($id);
        $car->title = $request['title'];
        $car->car_name = $request['car_name'];
        $car->car_details = $request['car_details'];
        $car->model_id = $request['model'];
        $car->branch_id = $request['branch'];
        $car->category_id = $request['category'];
        $car->year = $request['year'];
        $car->fual_id = $request['fual'];
        $car->color_id = $request['color'];
        $car->capacity_id = $request['capacity'];
        $car->isAuto = $request['isAuto'];
        $car->registration = $request['reg_no'];
        $car->miniAge = $request['age'];
        $car->picture = $fileName;
        $car->price_per_hour = $request['hourly_pack'];
        $car->price_per_day = $request['daily_pack'];
        $car->price_per_month = $request['monthly_pack'];
        $car->date = $request['date'];
        $car->created_at = Carbon::now('Asia/Dhaka')->toDateTimeString();
        $car->save();
        if ($car) {
            Session::flash('update', 'updated SuccessFully!');
            return redirect(route('cars'));
        }

    }
    // for upload picture
    public function updatePhoto($request, $id)
    {
        $car = Car::where('id', $id)->first();
        if ($request->hasFile('photo')) {
            $file_path = $car->picture;
            $storage_path = 'uploads/car/' . $file_path;
            if (\File::exists($storage_path)) {
                unlink($storage_path);
            }
            $picture = $request->file('photo');
            $images = Image::make($picture);
            $images->crop(700, 380);
            $fileName = pathinfo('_car_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/car/' . $fileName);
        } else {
            $fileName = $car['picture'];
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
        $destroy = Car::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('cars'));
        }
    }
}
