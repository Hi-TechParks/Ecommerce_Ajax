<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminContactEmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $emails = DB::table('nan_contact_email')
                    ->select('nan_contact_email.*')
                    ->where('FROM_EMAIL_ID', 'LIKE', '%'.$request->get('email').'%')
                    ->where('SUBJECT', 'LIKE', '%'.$request->get('subject').'%')
                    ->orderBy('CONTACT_EMAIL_ID', 'DESC')
                    ->paginate(10);
        //
        return view('admin.email.email_list')->with('emails', $emails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /*$addresses = DB::table('padu_contact_address')
                    ->select('padu_contact_address.*')
                    ->take(1)
                    ->get();*/

        //
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'subject' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);


        // Primary Key Generator
        $primary_key = DB::table('nan_contact_email')
                    ->select('nan_contact_email.CONTACT_EMAIL_ID')
                    ->max('CONTACT_EMAIL_ID');

        if (isset($primary_key)) {
            $email_id = $primary_key + '1';
        }
        else {
            $email_id = '20190001';
        }


        //
        $insert = DB::table('nan_contact_email')
                    ->insert([
                        'CONTACT_EMAIL_ID' => $email_id,
                        'FROM_EMAIL_ID' => $request->get('email'),
                        'SUBJECT' => $request->get('subject'),
                        'EMAIL_CONTENT' => $request->get('content'),
                        'ACTIVE_STATUS' => '1',
                        'ENTRY_TIMESTAMP' => Carbon::now()
                    ]);

        Session::flash('success', 'Mail Send Successfully!');


        //
        return redirect()->route('email.create');
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
        $emails = DB::table('nan_contact_email')
                    ->select('nan_contact_email.*')
                    ->where('CONTACT_EMAIL_ID', $id)
                    ->get();

        //
        return view('admin.email.email_view')->with('emails', $emails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        /*//
        $addresses = DB::table('padu_contact_address')
                    ->select('padu_contact_address.*')
                    ->where('CONTACT_ADDRESS_ID', '=', '1')
                    ->get();

        //
        return view('admin.address_edit')->with('addresses', $addresses);*/
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
        /*//
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        
        //
        $update = DB::table('padu_contact_address')
                ->where('CONTACT_ADDRESS_ID', $id)
                ->update([
                    'CONTACT_ADDRESS' => $request->get('address'),
                    'CONTACT_PHONE' => $request->get('phone'),
                    'CONTACT_EMAIL' => $request->get('email'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);


        Session::flash('success', 'Contact Details Updated Successfully!');


        //
        return redirect()->route('address.edit');*/
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


    public function status(Request $request, $id)
    {
        //
        $emails = DB::table('nan_contact_email')
                ->select('nan_contact_email.*')
                ->where('nan_contact_email.CONTACT_EMAIL_ID', '=', $id)
                ->get();

        foreach( $emails as $email ){
            if ($email->ACTIVE_STATUS == '1') {
                $update = DB::table('nan_contact_email')
                        ->where('CONTACT_EMAIL_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($email->ACTIVE_STATUS == '0') {
                $update = DB::table('nan_contact_email')
                        ->where('CONTACT_EMAIL_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $emails = DB::table('nan_contact_email')
                    ->select('nan_contact_email.*')
                    ->where('CONTACT_EMAIL_ID', $id)
                    ->orderBy('CONTACT_EMAIL_ID', 'DESC')
                    ->paginate(1);
        //
        return view('admin.email.email_list')->with('emails', $emails);

    }
}
