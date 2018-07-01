<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Model\Admin\Admin;
use App\Model\admin\role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = Admin::where('deleted_at', '=', null)->orderBy('id', 'DESC')->get();
        return view('admin.auth.user.index')->with('admins', $admins);
    }

    public function showRegistrationForm()
    {
        $roles = Role::get();
        return view('admin.auth.user.add-admin', compact('roles'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function store(AdminRequest $request)
    {
        $fileName = $this->photoUpload($request);
        $admin = new Admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->photo = $fileName ? $fileName : 'photo';
        $admin->varify_token = Str::random(40);
        $admin->password = Hash::make($request['password']);
        $admin->save();
        $admin->roles()->sync($request->role);
        if ($admin) {
            Session::flash('success', 'value');
            return redirect(route('admins'));
        }
    }

    public function photoUpload($request)
    {
        if ($request->hasFile('image')) {
            $picture = $request->file('image');
            $images = Image::make($picture);
            $images->resize(480, 600, function ($constrain) {
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_admin_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/admin/' . $fileName);
            return $fileName;
        }
    }

    public function view($id)
    {
        $view_admin = Admin::where('deleted_at', '=', null)->where('id', $id)->firstOrFail();
        return view('admin.auth.user.view-user', compact('view_admin'));
    }
    public function edit($id)
    {
        $edit_admin = Admin::with('roles')->where('deleted_at', '=', null)->where('id', $id)->firstOrFail();
        $roles = Role::all();
        return view('admin.auth.user.edit-user', compact('edit_admin', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $fileName = $this->photoUpdate($request, $id);
        $this->validate($request, [
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'phone' => 'required|string|max:11|min:10',
            'email' => 'required|string|email|max:255',
            'photo' => 'mimes:jpeg,jpg,png',
        ]);
        $update = Admin::findOrFail($id);
        $update->first_name = $request->first_name;
        $update->last_name = $request->last_name;
        $update->phone = $request->phone;
        $update->email = $request->email;
        $update->photo = $fileName;
        $update->password = Hash::make($request['password']);
        $update->roles()->sync($request->role);
        $update->save();
        if ($update) {
            Session::flash('update', 'value');
            return redirect(route('admins'));
        }
    }
    public function photoUpdate($request, $id)
    {
        $user = Admin::where('id', $id)->first();
        if ($request->hasFile('image')) {
            $file_path = $user->photo;
            $storage_path = 'uploads/admin/' . $file_path;
            if (\File::exists($storage_path)) {
                unlink($storage_path);
            }
            $picture = $request->file('image');
            $images = Image::make($picture);
            $images->resize(480, 600, function ($constrain) {
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_user_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
            $images->save('uploads/admin/' . $fileName);
        } else {
            $fileName = $user['photo'];
        }
        return $fileName;
    }
    public function destroy($id)
    {
        $destroy = Admin::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'value');
            return redirect(route('admins'));
        }
    }
}
