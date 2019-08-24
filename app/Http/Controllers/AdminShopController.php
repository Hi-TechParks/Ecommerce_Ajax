<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;
use DB;

class AdminShopController extends Controller
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
    public function index(Request $request)
    {
        $shops = DB::table('nan_shop')
                    ->select('nan_shop.*')
                    ->where('SHOP_NAME', 'LIKE', '%'.$request->get('shop_name').'%')
                    ->orderBy('SHOP_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.shop.shop_list')->with('shops', $shops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            'shop_name' => 'required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('nan_shop')
                    ->select('nan_shop.SHOP_ID')
                    ->max('SHOP_ID');

        if (isset($primary_key)) {
            $shop_id = $primary_key + '1';
        }
        else {
            $shop_id = '20190001';
        }


        $insert = DB::table('nan_shop')
            ->insert([
                'SHOP_ID' => $shop_id,
                'SHOP_NAME' => $request->get('shop_name'),
                'SHORT_CODE' => $request->get('short_code'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Shop Created Successfully!'); 

        //
        return redirect()->route('shop.index');
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
            'shop_name' => 'required',
        ]);

        //
        $update = DB::table('nan_shop')
            ->where('SHOP_ID', $id)
            ->update([
                'SHOP_NAME' => $request->get('shop_name'),
                'SHORT_CODE' => $request->get('short_code'),
                'ACTIVE_STATUS' => $request->get('active_status'),
                'UPDATED_BY' => Auth::user()->id,
                'UPDATE_TIMESTAMP' => Carbon::now()
            ]);
            

        Session::flash('success', 'Shop Updated Successfully!'); 

        //
        return redirect()->route('shop.index');
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
