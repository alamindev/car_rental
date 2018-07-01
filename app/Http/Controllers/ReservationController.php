<?php

namespace App\Http\Controllers;

use App\Reservation;
use DB;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::with('cars', 'users')->where('deleted_at', null)->orderBy('id', 'DESC')->get();
        return view('admin.reservation.reservation', compact('reservations'));
    }

    public function isPending($id)
    {
        $reservation = Reservation::where('deleted_at', null)->find($id);
        $reservation->isPending = 1;
        $reservation->save();
        DB::table('cars')->where('id', $reservation->car_id)->update(['status' => 0]);
    }
    public function isPaid($id)
    {
        $reservation = Reservation::where('deleted_at', null)->find($id);
        $reservation->isPaid = 1;
        $reservation->save();
    }
    public function isComplate($id)
    {
        $reservation = Reservation::where('deleted_at', null)->find($id);
        $reservation->isComplated = 1;
        $reservation->save();
        DB::table('cars')->where('id', $reservation->car_id)->update(['status' => 1]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view = Reservation::with('cars', 'users', 'PickupLocation', 'ReturnLocation')->where('deleted_at', null)->where('id', $id)->firstOrFail();
        return view('admin.reservation.view-reservation', compact('view'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Reservation::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'value');
            return redirect(route('reservation'));
        }
    }
}
