<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminProductColorController extends Controller
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
        $colors = DB::table('nan_color')
                    ->select('nan_color.*')
                    ->where('COLOR_NAME', 'LIKE', '%'.$request->get('color_name').'%')
                    ->orderBy('COLOR_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.color.color_list')->with('colors', $colors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.color.color_create');
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
            'color' => 'required',
            'color_code' => 'required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('nan_color')
                    ->select('nan_color.COLOR_ID')
                    ->max('COLOR_ID');

        if (isset($primary_key)) {
            $color_id = $primary_key + '1';
        }
        else {
            $color_id = '20190001';
        }


        $insert = DB::table('nan_color')
            ->insert([
                'COLOR_ID' => $color_id,
                'COLOR_NAME' => $request->get('color'),
                'COLOR_CODE' => $request->get('color_code'),
                'SHORT_CODE' => $request->get('short_code'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Color Created Successfully!'); 

        //
        return redirect()->route('color.create');
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
        $colors = DB::table('nan_color')
                    ->select('nan_color.*')
                    ->where('COLOR_ID', $id)
                    ->get();

        //
        return view('admin.color.color_edit')->with('colors', $colors);
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
            'color' => 'required',
            'color_code' => 'required',
        ]);


        $update = DB::table('nan_color')
                ->where('COLOR_ID', $id)
                ->update([
                    'COLOR_NAME' => $request->get('color'),
                    'COLOR_CODE' => $request->get('color_code'),
                    'SHORT_CODE' => $request->get('short_code'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Color Updated Successfully!'); 

        //
        return redirect()->route('color.edit', [$id]);
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
        $colors = DB::table('nan_color')
                ->select('nan_color.*')
                ->where('nan_color.COLOR_ID', '=', $id)
                ->get();

        foreach( $colors as $color ){
            if ($color->ACTIVE_STATUS == '1') {
                $update = DB::table('nan_color')
                        ->where('COLOR_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($color->ACTIVE_STATUS == '0') {
                $update = DB::table('nan_color')
                        ->where('COLOR_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $colors = DB::table('nan_color')
                    ->select('nan_color.*')
                    ->where('COLOR_ID', $id)
                    ->paginate(1);

        //
        return view('admin.color.color_list')->with('colors', $colors);

    }
}
