<?php

namespace App\Http\Controllers;

use App\Model\User\User;
use Symfony\Component\HttpFoundation\Session\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('status', 1)->orWhere('verifyToken', null)->get();
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view = User::where('status', 1)->orWhere('verifyToken', null)->where('id', $id)->firstOrFail();
        return view('admin.customer.view-customer', compact('view'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = User::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'value');
            return redirect(route('customers'));
        }
    }
}
