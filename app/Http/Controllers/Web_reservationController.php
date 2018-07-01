<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Car;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Web_reservationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::with('cars')->orderBy('id', 'DESC')->get();
        return view('website.reservation.reservation', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cars = Car::where('deleted_at', null)->get();
        foreach ($cars as $car) {
            if ($car->status == 1) {
                $branches = Branch::select('id', 'branch_name')->get();
                $car = Car::where('id', $id)->first();
                return view('website.reservation.add-reservation', compact('branches', 'car'));
            } else {
                return redirect(route('web_car_details', $car->id));
            }
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
            'pickupLocation' => 'required',
            'returnLocation' => 'required',
            'pickupDate' => 'required',
            'returnDate' => 'required',
            'pickupTime' => 'required',
            'returnTime' => 'required',
        ]);
        $pickupDate = Carbon::parse($request->pickupDate . " " . $request->pickupTime);
        $total = $pickupDate->diffInMinutes(Carbon::parse($request->returnDate . " " . $request->returnTime));
        $sum = $request->price_per_hour / 60 * $total + $request->extra;

        $reservation = new Reservation();
        $reservation->user_id = auth()->user()->id;
        $reservation->car_id = $request->car;
        $reservation->pickupLocation = $request->pickupLocation;
        $reservation->returnLocation = $request->returnLocation;
        $reservation->pickupDate = Carbon::parse($request->pickupDate)->format('Y-m-d');
        $reservation->pickupTime = Carbon::parse($request->pickupTime)->format('H:i:s');
        $reservation->returnDate = Carbon::parse($request->returnDate)->format('Y-m-d');
        $reservation->returnTime = Carbon::parse($request->returnTime)->format('H:i:s');
        $reservation->extra = $request->extra;
        $reservation->price = $sum;
        $reservation->save();

        return redirect(route('web_reservation_all'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
