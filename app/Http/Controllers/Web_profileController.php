<?php

namespace App\Http\Controllers;

use App\Model\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class Web_profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (Auth()->check()) {
            $profile = User::where('id', $id)->first();
            return view('website.profile.profile', compact('profile'));
        } else {
            return redirect(route('login'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->check()) {
            $profile = User::where('id', $id)->first();
            $edit = User::where('id', $id)->first();
            return view('website.profile.edit-profile', compact('profile', 'edit'));
        } else {
            return redirect(route('login'));
        }
    }

    public function update(Request $request, $id)
    {
        if (auth()->check()) {
            $user = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->user_name = $request->user_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->save();
            return redirect(route('web_profile', $user->id));
        } else {
            return redirect(route('login'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if (auth()->check()) {
            $this->validate($request, [
                'photo' => 'required',
            ]);
            if ($request->hasFile('photo')) {
                $picture = $request->file('photo');
                $images = Image::make($picture);
                $images->resize(480, 600, function ($constrain) {
                    $constrain->aspectRatio();
                });
                $fileName = pathinfo('_user_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
                $images->save('uploads/user/' . $fileName);
            }
            $user = User::find($id);
            $user->image = $fileName;
            $user->save();
            return redirect(route('web_profile', $user->id));
        } else {
            return redirect(route('login'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function photoUpdate(Request $request, $id)
    {
        if (auth()->check()) {
            $user = User::where('id', $id)->first();
            if ($request->hasFile('photo')) {
                $file_path = $user->image;
                $storage_path = 'uploads/user/' . $file_path;
                if (\File::exists($storage_path)) {
                    unlink($storage_path);
                }
                $picture = $request->file('photo');
                $images = Image::make($picture);
                $images->resize(480, 600, function ($constrain) {
                    $constrain->aspectRatio();
                });
                $fileName = pathinfo('_user_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
                $images->save('uploads/user/' . $fileName);
            } else {
                $fileName = $user['image'];
            }
            $user = User::find($id);
            $user->image = $fileName;
            $user->save();
            return redirect(route('web_profile', $user->id));
        } else {
            return redirect(route('login'));
        }
    }

    public function ChangePass($id)
    {
        if (auth()->check()) {
            $profile = User::where('id', $id)->first();
            $edit = User::where('id', $id)->first();
            return view('website.password.change-password', compact('profile', 'edit'));
        } else {
            return redirect(route('login'));
        }
    }
    public function OldPass(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
        ]);
        $user = User::where('id', $request->id)->first();

        if ($user->email == $request->email && Hash::check($request['password'], $user->password)) {
            return redirect(route('new_pass', $user->id));
        } else {
            if (auth()->check()) {
                $profile = User::where('id', $request->id)->first();
                $edit = User::where('id', $request->id)->first();
                $error = 'You Email Or Old Password Incorrect !';
                return view('website.password.change-password', compact('profile', 'edit', 'error'));
            } else {
                return redirect(route('login'));
            }
        }
    }
    public function NewPass($id)
    {
        if (auth()->check()) {
            $profile = User::where('id', $id)->first();
            $edit = User::where('id', $id)->first();
            return view('website.password.new-password', compact('profile', 'edit'));
        } else {
            return redirect(route('login'));
        }
    }
    public function UpdatePass(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required',
        ]);
        $user = User::where('id', $request->id)->first();
        if ($user) {
            if ($request->password == $request->confirm_password) {
                $update = User::where('id', $request->id)->update([
                    'password' => Hash::make($request['password']),
                ]);
                return redirect(route('web_profile', $user->id));
            } else {
                $profile = User::where('id', $id)->first();
                $edit = User::where('id', $id)->first();
                $error = 'Confirm Password Do Not Match';
                return view('website.password.new-password', compact('error', 'profile', 'edit'));
            }
        }
    }
}
