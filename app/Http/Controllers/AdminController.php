<?php

namespace App\Http\Controllers;

use App\Car;
use App\Model\Admin\Admin;
use App\Model\User\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //coding for index main
    public function index()
    {
        $admin = Admin::where('deleted_at', null)->get();
        $user = User::get();
        $car = Car::where('deleted_at', null)->get();
        return view('admin.home.index', compact('admin', 'user', 'car'));
    }
}
