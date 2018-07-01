<?php

namespace App\Http\Controllers;

use App\Contact;
use App\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Web_contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userContacts = userContact::where('deleted_at', null)->orderBy('id', 'desc')->get();
        return view('admin.userContact.userContact', compact('userContacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = Contact::first();
        return view('website.contact.contact', compact('contact'));
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
            'name' => 'required',
            'email' => 'required|unique:user_contacts',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $userContact = new UserContact();
        $userContact->name = $request->name;
        $userContact->email = $request->email;
        $userContact->subject = $request->subject;
        $userContact->message = $request->message;
        $userContact->save();
        if ($userContact) {
            Session::flash('message', 'Message Send SuccessFully!');
            return redirect(route('web_contact'));
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
        $show_user_contact = userContact::where('deleted_at', null)->firstOrFail();
        return view('admin.userContact.show-userContact', compact('show_user_contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = userContact::where('deleted_at', null)->firstOrFail();
        return view('admin.userContact.edit-userContact', compact('edit'));
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
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $userContact = userContact::findOrFail($id);
        $userContact->name = $request->name;
        $userContact->email = $request->email;
        $userContact->subject = $request->subject;
        $userContact->message = $request->message;
        $userContact->save();
        if ($userContact) {
            Session::flash('update', 'User contact Updated SuccessFully!');
            return redirect(route('user_contact'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = userContact::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('user_contact'));
        }
    }
}
