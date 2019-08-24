<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminProductBrandController extends Controller
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
        $brands = DB::table('nan_brand')
                    ->select('nan_brand.*')
                    ->where('BRAND_NAME', 'LIKE', '%'.$request->get('brand_name').'%')
                    ->orderBy('BRAND_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.brand.brand_list')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.brand.brand_create');
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
            'brand' => 'required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('nan_brand')
                    ->select('nan_brand.BRAND_ID')
                    ->max('BRAND_ID');

        if (isset($primary_key)) {
            $brand_id = $primary_key + '1';
        }
        else {
            $brand_id = '20190001';
        }


        $insert = DB::table('nan_brand')
            ->insert([
                'BRAND_ID' => $brand_id,
                'BRAND_NAME' => $request->get('brand'),
                'SHORT_CODE' => $request->get('short_code'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Brand Created Successfully!'); 

        //
        return redirect()->route('brand.create');
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
        $brands = DB::table('nan_brand')
                    ->select('nan_brand.*')
                    ->where('BRAND_ID', $id)
                    ->get();

        //
        return view('admin.brand.brand_edit')->with('brands', $brands);
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
            'brand' => 'required',
        ]);


        $update = DB::table('nan_brand')
                ->where('BRAND_ID', $id)
                ->update([
                    'BRAND_NAME' => $request->get('brand'),
                    'SHORT_CODE' => $request->get('short_code'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Brand Updated Successfully!'); 

        //
        return redirect()->route('brand.edit', [$id]);
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
        $brands = DB::table('nan_brand')
                ->select('nan_brand.*')
                ->where('nan_brand.BRAND_ID', '=', $id)
                ->get();

        foreach( $brands as $brand ){
            if ($brand->ACTIVE_STATUS == '1') {
                $update = DB::table('nan_brand')
                        ->where('BRAND_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($brand->ACTIVE_STATUS == '0') {
                $update = DB::table('nan_brand')
                        ->where('BRAND_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $brands = DB::table('nan_brand')
                    ->select('nan_brand.*')
                    ->where('BRAND_ID', $id)
                    ->paginate(1);

        //
        return view('admin.brand.brand_list')->with('brands', $brands);

    }
}
