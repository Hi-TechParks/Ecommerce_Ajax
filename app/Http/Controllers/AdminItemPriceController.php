<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use File;
use DB;

class AdminItemPriceController extends Controller
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
            'product_id' => 'required',
            'product_price' => 'required',
            'price_currency' => 'required',
        ]);


        $product_id = $request->get('product_id');


        // Primary Key Generator for Price Table
        $primary_key = DB::table('nan_product_price')
                    ->select('nan_product_price.PRODUCT_PRICE_ID')
                    ->max('PRODUCT_PRICE_ID');

        if (isset($primary_key)) {
            $price_id = $primary_key + '1';
        }
        else {
            $price_id = '20190001';
        }


        // Insert Product Price
        $insert = DB::table('nan_product_price')
            ->insert([
                'PRODUCT_PRICE_ID' => $price_id,
                'PRODUCT_ID' => $request->get('product_id'),
                'PRICE' => $request->get('product_price'),
                'CURRENCY_ID' => $request->get('price_currency'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);


        Session::flash('success', 'Product Price Created Successfully!'); 

        //
        return redirect()->route('item.price.show', [$product_id]);
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
        $prices = DB::table('nan_product_price')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', 'nan_product_price.PRODUCT_ID')
                    ->join('bg_currency', 'bg_currency.CURRENCY_ID', 'nan_product_price.CURRENCY_ID')
                    ->select('nan_product_price.*', 'nan_product.PRODUCT_NAME', 'bg_currency.CURRENCY_NAME')
                    ->where('nan_product_price.PRODUCT_ID', $id)
                    ->orderBy('nan_product_price.PRODUCT_PRICE_ID', 'DESC')
                    ->paginate(10);

        //
        $items = DB::table('nan_product')
                    ->select('nan_product.*')
                    ->where('PRODUCT_ID', $id)
                    ->get();

        //
        $currencies = DB::table('bg_currency')
                    ->select('bg_currency.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->get();

        //
        return view('admin.item.item_price_list')
                                ->with('prices', $prices)
                                ->with('items', $items)
                                ->with('currencies', $currencies);
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
            'product_price' => 'required',
            'price_currency' => 'required',
        ]);


        $product_id = $request->get('product_id');

            
        // Update Product Price
        $update = DB::table('nan_product_price')
            ->where('PRODUCT_PRICE_ID', $id)
            ->update([
                'PRICE' => $request->get('product_price'),
                'CURRENCY_ID' => $request->get('price_currency'),
                'ACTIVE_STATUS' => $request->get('active_status'),
                'UPDATED_BY' => Auth::user()->id,
                'UPDATE_TIMESTAMP' => Carbon::now()
            ]);


        Session::flash('success', 'Product Price Updated Successfully!'); 

        //
        return redirect()->route('item.price.show', [$product_id]);
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
