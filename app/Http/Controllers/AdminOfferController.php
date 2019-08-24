<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use File;
use DB;

class AdminOfferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        //
        $offers = DB::table('nan_offer')
                    ->select('nan_offer.*')
                    ->orderBy('OFFER_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.offer.offer_list')->with('offers', $offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
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
            'offer_name' => 'required',
            'offer_percentage' => 'required|numeric',
            'offer_start' => 'required|date|after_or_equal:today',
            'offer_end' => 'required|date|after_or_equal:offer_start',
        ]);


        // Primary Key Generator for Color Table
        $primary_key = DB::table('nan_offer')
                    ->select('nan_offer.OFFER_ID')
                    ->max('OFFER_ID');

        if (isset($primary_key)) {
            $offer_id = $primary_key + '1';
        }
        else {
            $offer_id = '20190001';
        }


        // Insert Offer
        $insert = DB::table('nan_offer')
            ->insert([
                'OFFER_ID' => $offer_id,
                'OFFER_NAME' => $request->get('offer_name'),
                'OFFER_PERCENTAGE' => $request->get('offer_percentage'),
                'CHD_EXIST' => $request->get('child_exist'),
                'VALID_FROM_DATE' => $request->get('offer_start'),
                'VALID_END_DATE' => $request->get('offer_end'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);


        Session::flash('success', 'Offer Created Successfully!'); 

        //
        return redirect()->route('offer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $request->validate([
            'offer_name' => 'required',
            'offer_percentage' => 'required|numeric',
            'offer_start' => 'required|date',
            'offer_end' => 'required|date|after_or_equal:offer_start',
        ]);

            
        // Update Offer
        $update = DB::table('nan_offer')
            ->where('OFFER_ID', $id)
            ->update([
                'OFFER_NAME' => $request->get('offer_name'),
                'OFFER_PERCENTAGE' => $request->get('offer_percentage'),
                'CHD_EXIST' => $request->get('child_exist'),
                'VALID_FROM_DATE' => $request->get('offer_start'),
                'VALID_END_DATE' => $request->get('offer_end'),
                'ACTIVE_STATUS' => $request->get('active_status'),
                'UPDATED_BY' => Auth::user()->id,
                'UPDATE_TIMESTAMP' => Carbon::now()
            ]);


        Session::flash('success', 'Offer Updated Successfully!'); 

        //
        return redirect()->route('offer.index');
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
