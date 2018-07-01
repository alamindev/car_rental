<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
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
        try {
            if (!Contact::count()) {
                return view('admin.contact.add-contact');
            } else {
                $contact = Contact::firstOrFail();
                return view('admin.contact.contact', compact('contact'));
            }
        } catch (Exception $x) {
            return 'there are some problem';
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
            'title' => 'required|unique:contacts|max:255',
            'reg_address' => 'required',
            'email_address' => 'required|unique:contacts',
            'call_us' => 'required',
            'sms' => 'required',
            'google_link' => 'required',
            'open_day_1' => 'required',
            'open_time_1' => 'required',
            'open_day_2' => 'required',
            'open_time_2' => 'required',
            'open_day_3' => 'required',
            'open_time_3' => 'required',
        ]);
        $contact = new Contact();
        $contact->title = $request->title;
        $contact->reg_address = $request->reg_address;
        $contact->email_address = $request->email_address;
        $contact->call_us = $request->call_us;
        $contact->sms = $request->sms;
        $contact->google_link = $request->google_link;
        $contact->open_day_1 = $request->open_day_1;
        $contact->open_time_1 = $request->open_time_1;
        $contact->open_day_2 = $request->open_day_2;
        $contact->open_time_2 = $request->open_time_2;
        $contact->open_day_3 = $request->open_day_3;
        $contact->open_time_3 = $request->open_time_3;
        $contact->save();
        if ($contact) {
            Session::flash('message', 'contact added SuccessFully!');
            return redirect(route('contact'));
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
        $show_contact = Contact::where('id', $id)->firstOrFail();
        return view('admin.contact.show-contact', compact('show_contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Contact::where('id', $id)->firstOrFail();
        return view('admin.contact.edit-contact', compact('edit'));
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
        $this->validate($request, [
            'title' => 'required',
            'reg_address' => 'required',
            'email_address' => 'required',
            'call_us' => 'required',
            'sms' => 'required',
            'google_link' => 'required',
            'google_link' => 'required',
            'open_day_1' => 'required',
            'open_time_1' => 'required',
            'open_day_2' => 'required',
            'open_time_2' => 'required',
            'open_day_3' => 'required',
            'open_time_3' => 'required',
        ]);
        $contact = Contact::findOrFail($id);
        $contact->title = $request->title;
        $contact->reg_address = $request->reg_address;
        $contact->email_address = $request->email_address;
        $contact->call_us = $request->call_us;
        $contact->sms = $request->sms;
        $contact->google_link = $request->google_link;
        $contact->open_day_1 = $request->open_day_1;
        $contact->open_time_1 = $request->open_time_1;
        $contact->open_day_2 = $request->open_day_2;
        $contact->open_time_2 = $request->open_time_2;
        $contact->open_day_3 = $request->open_day_3;
        $contact->open_time_3 = $request->open_time_3;
        $contact->save();
        if ($contact) {
            Session::flash('message', 'update contact SuccessFully!');
            return redirect(route('contact'));
        }
    }

}
