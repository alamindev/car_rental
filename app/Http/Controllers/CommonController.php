<?php

namespace App\Http\Controllers;

use App\About;
use App\Choose;
use App\Privacy;
use App\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class CommonController extends Controller
{
// coding for choose
    public function Choose()
    {
        $choose = Choose::first();
        return view('website.choose.choose_details', compact('choose'));
    }
    // about us
    public function About()
    {
        $about = About::first();
        return view('website.about.about', compact('about'));
    }
    // coding for privacy
    public function Privacy()
    {
        $privacy = Privacy::first();
        return view('website.privacy.privacy', compact('privacy'));
    }
    // coding for privacy
    public function Term()
    {
        $term = Term::first();
        return view('website.term.term', compact('term'));
    }

    // start coding for chairman
    public function Chairman()
    {
        $logoTitle = LogoTitle::where('deleted_at', null)->first();
        $contact = Contact::first();
        $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
        $about = About::first();
        $social = Social::first();
        $chairman = Chairman::first();
        $copyright = DB::table('copyrights')->first();
        return view('website.chairman.chairman', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'chairman'));
    }
    // start coding for chairman
    public function viceChairman()
    {
        $logoTitle = LogoTitle::where('deleted_at', null)->first();
        $contact = Contact::first();
        $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
        $about = About::first();
        $social = Social::first();
        $vice_chairman = ViceChairman::first();
        $copyright = DB::table('copyrights')->first();
        return view('website.vice-chairman.vice-chairman', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'vice_chairman'));
    }
    // start coding for service
    public function Service()
    {
        $logoTitle = LogoTitle::where('deleted_at', null)->first();
        $contact = Contact::first();
        $services = Services::where('deleted_at', null)->orderBy('id', 'desc')->get();
        $about = About::first();
        $social = Social::first();
        $vice_chairman = ViceChairman::first();
        $copyright = DB::table('copyrights')->first();
        return view('website.service.service', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'vice_chairman'));
    }
    // start coding for service
    public function ServiceDetails($id)
    {
        $logoTitle = LogoTitle::where('deleted_at', null)->first();
        $contact = Contact::first();
        $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
        $service_details = Services::where('deleted_at', null)->where('id', $id)->first();
        $about = About::first();
        $social = Social::first();
        $copyright = DB::table('copyrights')->first();
        return view('website.service.service-details', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'service_details'));
    }

    // start coding for service
    public function Loans()
    {
        $logoTitle = LogoTitle::where('deleted_at', null)->first();
        $contact = Contact::first();
        $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
        $about = About::first();
        $social = Social::first();
        $vice_chairman = ViceChairman::first();
        $loans = Loan::where('deleted_at', null)->orderBy('id', 'desc')->get();
        $copyright = DB::table('copyrights')->first();
        return view('website.loans.loans', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'loans'));
    }
    // start coding for service
    public function LoanDetails($id)
    {
        $logoTitle = LogoTitle::where('deleted_at', null)->first();
        $contact = Contact::first();
        $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
        $about = About::first();
        $social = Social::first();
        $vice_chairman = ViceChairman::first();
        $loan = Loan::where('deleted_at', null)->where('id', $id)->first();
        $copyright = DB::table('copyrights')->first();
        return view('website.loans.loan-details', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'loan'));
    }
    // start coding for Photo
    public function Photo()
    {
        $logoTitle = LogoTitle::where('deleted_at', null)->first();
        $contact = Contact::first();
        $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
        $about = About::first();
        $social = Social::first();
        $vice_chairman = ViceChairman::first();
        $gellaries = Gellary::where('deleted_at', null)->get();
        $copyright = DB::table('copyrights')->first();
        return view('website.photo.photo', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'gellaries'));
    }
    // start coding for Video
    public function Video()
    {
        $logoTitle = LogoTitle::where('deleted_at', null)->first();
        $contact = Contact::first();
        $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
        $about = About::first();
        $social = Social::first();
        $vice_chairman = ViceChairman::first();
        $copyright = DB::table('copyrights')->first();
        $videos = Video::where('deleted_at', null)
            ->orderBy('id', 'desc')
            ->get();
        return view('website.video.video', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'videos'));
    }
    // start coding for Video
    public function Event()
    {
        $logoTitle = LogoTitle::where('deleted_at', null)->first();
        $contact = Contact::first();
        $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
        $about = About::first();
        $social = Social::first();
        $copyright = DB::table('copyrights')->first();
        $events = Event::where('deleted_at', null)->limit(1)->orderBy('id', 'DESC')->orderBy('date', 'desc')->get();
        return view('website.event.event', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'events'));
    }
    // start coding for Video
    public function LogInForm()
    {
        $logoTitle = LogoTitle::where('deleted_at', null)->first();
        $contact = Contact::first();
        $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
        $about = About::first();
        $social = Social::first();
        $copyright = DB::table('copyrights')->first();

        return view('website.login.login', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright'));
    }

    // start coding for user information
    public function UserInfo()
    {
        if (Auth::guard('admin')->check()) {
            $logoTitle = LogoTitle::where('deleted_at', null)->first();
            $contact = Contact::first();
            $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
            $about = About::first();
            $social = Social::first();
            $vice_chairman = ViceChairman::first();
            $user_infos = UserInfo::where('deleted_at', null)->orderBy('id', 'desc')->get();
            $copyright = DB::table('copyrights')->first();
            return view('website.user_info.user_info', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'user_infos'));
        } else {
            return redirect(route('web-LogInform'));
        }
    }
    // start coding for service
    public function UserInfoDetail($id)
    {
        if (Auth::guard('admin')->check()) {
            $logoTitle = LogoTitle::where('deleted_at', null)->first();
            $contact = Contact::first();
            $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
            $about = About::first();
            $social = Social::first();
            $vice_chairman = ViceChairman::first();
            $user_info = UserInfo::where('deleted_at', null)->where('id', $id)->first();
            $copyright = DB::table('copyrights')->first();
            return view('website.user_info.user_info_details', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'user_info'));
        } else {
            return redirect(route('web-LogInform'));
        }
    }

    // start coding for profile
    public function Profile($id)
    {
        if (Auth::guard('admin')->check()) {
            $logoTitle = LogoTitle::where('deleted_at', null)->first();
            $contact = Contact::first();
            $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
            $about = About::first();
            $social = Social::first();
            $vice_chairman = ViceChairman::first();
            $profile = Admin::where('deleted_at', null)->where('id', $id)->first();
            $copyright = DB::table('copyrights')->first();
            return view('website.profile.profile', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'profile'));
        } else {
            return redirect(route('web-LogInform'));
        }
    }
    // start coding for profile
    public function Edit($id)
    {
        if (Auth::guard('admin')->check()) {
            $logoTitle = LogoTitle::where('deleted_at', null)->first();
            $contact = Contact::first();
            $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
            $about = About::first();
            $social = Social::first();
            $vice_chairman = ViceChairman::first();
            $profile = Admin::where('deleted_at', null)->where('id', $id)->first();
            $edit = Admin::where('deleted_at', null)->where('id', $id)->first();
            $copyright = DB::table('copyrights')->first();
            return view('website.profile.edit-profile', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'profile', 'edit'));
        } else {
            return redirect(route('web-LogInform'));
        }
    }
    // start coding for profile
    public function Update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $admin = Admin::find($id);
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->phone = $request->phone;
            $admin->email = $request->email;
            $admin->save();
            return redirect(route('web_profile', $admin->id));
        } else {
            return redirect(route('web-LogInform'));
        }
    }
    // start coding for profile
    public function UploadPhoto(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                'photo' => 'required|mimes:jpeg,jpg,png',
            ]);
            if ($request->hasFile('photo')) {
                $picture = $request->file('photo');
                $images = Image::make($picture);
                $images->resize(480, 600, function ($constrain) {
                    $constrain->aspectRatio();
                });
                $fileName = pathinfo('_admin_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
                $images->save('uploads/admin/' . $fileName);
            }
            $admin = Admin::find($id);
            $admin->photo = $fileName;
            $admin->save();
            return redirect(route('web_profile', $admin->id));
        } else {
            return redirect(route('web-LogInform'));
        }
    }
    // start coding for profile
    public function UpdatePhoto(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $user = Admin::where('id', $id)->first();
            if ($request->hasFile('photo')) {
                $file_path = $user->photo;
                $storage_path = 'uploads/admin/' . $file_path;
                if (\File::exists($storage_path)) {
                    unlink($storage_path);
                }
                $picture = $request->file('photo');
                $images = Image::make($picture);
                $images->resize(480, 600, function ($constrain) {
                    $constrain->aspectRatio();
                });
                $fileName = pathinfo('_user_' . '_' . rand(), PATHINFO_FILENAME) . '.' . $picture->getClientOriginalExtension();
                $images->save('uploads/admin/' . $fileName);
            } else {
                $fileName = $user['photo'];
            }
            $admin = Admin::find($id);
            $admin->photo = $fileName;
            $admin->save();
            return redirect(route('web_profile', $admin->id));
        } else {
            return redirect(route('web-LogInform'));
        }
    }
    // start coding for change password
    public function ChangePass($id)
    {
        if (Auth::guard('admin')->check()) {
            $logoTitle = LogoTitle::where('deleted_at', null)->first();
            $contact = Contact::first();
            $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
            $about = About::first();
            $social = Social::first();
            $vice_chairman = ViceChairman::first();
            $profile = Admin::where('deleted_at', null)->where('id', $id)->first();
            $edit = Admin::where('deleted_at', null)->where('id', $id)->first();
            $copyright = DB::table('copyrights')->first();
            return view('website.password.change-password', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'profile', 'edit'));
        } else {
            return redirect(route('web-LogInform'));
        }
    }

    public function OldPass(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
        ]);
        $admin = Admin::where('deleted_at', null)->where('id', $request->id)->first();

        if ($admin->email == $request->email && Hash::check($request['password'], $admin->password)) {
            return redirect(route('new_pass', $admin->id));
        } else {
            if (Auth::guard('admin')->check()) {
                $logoTitle = LogoTitle::where('deleted_at', null)->first();
                $contact = Contact::first();
                $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
                $about = About::first();
                $social = Social::first();
                $vice_chairman = ViceChairman::first();
                $profile = Admin::where('deleted_at', null)->where('id', $request->id)->first();
                $edit = Admin::where('deleted_at', null)->where('id', $request->id)->first();
                $copyright = DB::table('copyrights')->first();
                $error = 'You Email Or Old Password Incorrect !';
                return view('website.password.change-password', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'profile', 'edit', 'error'));
            } else {
                return redirect(route('web-LogInform'));
            }
        }
    }
    public function NewPass($id)
    {
        if (Auth::guard('admin')->check()) {
            $logoTitle = LogoTitle::where('deleted_at', null)->first();
            $contact = Contact::first();
            $services = Services::where('deleted_at', null)->limit(6)->orderBy('id', 'desc')->get();
            $about = About::first();
            $social = Social::first();
            $vice_chairman = ViceChairman::first();
            $profile = Admin::where('deleted_at', null)->where('id', $id)->first();
            $edit = Admin::where('deleted_at', null)->where('id', $id)->first();
            $copyright = DB::table('copyrights')->first();
            return view('website.password.new-password', compact('about', 'logoTitle', 'contact', 'services', 'about', 'social', 'copyright', 'profile', 'edit'));
        } else {
            return redirect(route('web-LogInform'));
        }
    }
    public function UpdatePass(Request $request)
    {
        $admin = Admin::where('deleted_at', null)->where('id', $request->id)->first();
        if ($admin) {
            $update = Admin::where('deleted_at', null)->where('id', $request->id)->update([
                'password' => Hash::make($request['password']),
            ]);
            return redirect(route('web_profile', $admin->id));
        }
    }
}
