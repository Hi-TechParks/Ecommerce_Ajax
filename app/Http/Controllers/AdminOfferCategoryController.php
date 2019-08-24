<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use File;
use DB;

class AdminOfferCategoryController extends Controller
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
    public function index($id)
    {
        //
        $offers = DB::table('nan_offer_category')
                    ->join('nan_offer', 'nan_offer.OFFER_ID', '=', 'nan_offer_category.PRODUCT_OFFER_ID')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_offer_category.PRODUCT_CATEGORY_ID')
                    ->select('nan_offer_category.*', 'nan_offer.OFFER_NAME', 'nan_product_category.CATEGORY_NAME')
                    ->where('nan_offer.OFFER_ID', $id)
                    ->orderBy('nan_offer_category.OFFER_CATEGORY_ID', 'DESC')
                    ->paginate(10);

        //
        $parent_offers = DB::table('nan_offer')
                        ->select('nan_offer.*')
                        ->where('nan_offer.OFFER_ID', $id)
                        ->get();

        //
        $categories = DB::table('nan_product_category')
                    ->select('nan_product_category.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('CATEGORY_NAME', 'ASC')
                    ->get();

        //
        return view('admin.offer.offer_category_list')
                                ->with('parent_offers', $parent_offers)
                                ->with('categories', $categories)
                                ->with('offers', $offers);
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
            'offer_id' => 'required',
            'offer_percentage' => 'nullable|numeric',
            'offer_gross' => 'nullable|numeric',
            'offer_category' => 'required',
            'offer_start' => 'required|date|after_or_equal:today',
            'offer_end' => 'required|date|after_or_equal:offer_start',
        ]);

        $offer_id = $request->get('offer_id');


        // Primary Key Generator for Color Table
        $primary_key = DB::table('nan_offer_category')
                    ->select('nan_offer_category.OFFER_CATEGORY_ID')
                    ->max('OFFER_CATEGORY_ID');

        if (isset($primary_key)) {
            $offer_cate_id = $primary_key + '1';
        }
        else {
            $offer_cate_id = '20190001';
        }


        // Insert Offer
        $insert = DB::table('nan_offer_category')
            ->insert([
                'OFFER_CATEGORY_ID' => $offer_cate_id,
                'PRODUCT_OFFER_ID' => $request->get('offer_id'),
                'OFFER_PERCENTAGE' => $request->get('offer_percentage'),
                'OFFER_GROSS' => $request->get('offer_gross'),
                'PRODUCT_CATEGORY_ID' => $request->get('offer_category'),
                'CHD_EXIST' => $request->get('child_exist'),
                'VALID_FROM_DATE' => $request->get('offer_start'),
                'VALID_END_DATE' => $request->get('offer_end'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);


        Session::flash('success', 'Offer Category Created Successfully!'); 

        //
        return redirect()->route('offer.category.index', [$offer_id]);
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
            'offer_id' => 'required',
            'offer_percentage' => 'nullable|numeric',
            'offer_gross' => 'nullable|numeric',
            'offer_category' => 'required',
            'offer_start' => 'required|date',
            'offer_end' => 'required|date|after_or_equal:offer_start',
        ]);

        $offer_id = $request->get('offer_id');

            
        // Update Offer
        $update = DB::table('nan_offer_category')
            ->where('OFFER_CATEGORY_ID', $id)
            ->update([
                'PRODUCT_OFFER_ID' => $request->get('offer_id'),
                'OFFER_PERCENTAGE' => $request->get('offer_percentage'),
                'OFFER_GROSS' => $request->get('offer_gross'),
                'PRODUCT_CATEGORY_ID' => $request->get('offer_category'),
                'CHD_EXIST' => $request->get('child_exist'),
                'VALID_FROM_DATE' => $request->get('offer_start'),
                'VALID_END_DATE' => $request->get('offer_end'),
                'ACTIVE_STATUS' => $request->get('active_status'),
                'UPDATED_BY' => Auth::user()->id,
                'UPDATE_TIMESTAMP' => Carbon::now()
            ]);


        Session::flash('success', 'Offer Category Updated Successfully!'); 

        //
        return redirect()->route('offer.category.index', [$offer_id]);
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
