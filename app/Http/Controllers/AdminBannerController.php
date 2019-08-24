<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminBannerController extends Controller
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
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('BANNER_TITLE', 'LIKE', '%'.$request->get('banner_title').'%')
                    ->orderBy('BANNER_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.banner.banner_list')->with('banners', $banners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banner.banner_create');
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
            'banner_title' => 'required',
            'details' => 'required',
            'page_name' => 'required',
            'location' => 'required',
            'serial_no' => 'required',
            'banner_image' => 'image|required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('nan_banner')
                    ->select('nan_banner.BANNER_ID')
                    ->max('BANNER_ID');

        if (isset($primary_key)) {
            $banner_id = $primary_key + '1';
        }
        else {
            $banner_id = '20190001';
        }


        // image upload, fit and store inside public folder 
        if($request->hasFile('banner_image')){
            $filenameWithExt = $request->file('banner_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (1920 width, 800 height)
            $thumbnailpath = 'uploads/images/banner/'.$fileNameToStore;
            $img = Image::make($request->file('banner_image')->getRealPath())->resize(400, null, function ($constraint) { $constraint->aspectRatio(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        $insert = DB::table('nan_banner')
            ->insert([
                'BANNER_ID' => $banner_id,
                'BANNER_TITLE' => $request->get('banner_title'),
                'BANNER_DESC' => $request->get('details'),
                'IMAGE_PATH' => $fileNameToStore,
                'PAGE_SHORT_CODE' => $request->get('page_name'),
                'PAGE_LOC_SHORT_CODE' => $request->get('location'),
                'SL_NO' => $request->get('serial_no'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Banner Created Successfully!'); 

        //
        return redirect()->route('banner.create');
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
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('BANNER_ID', $id)
                    ->get();

        //
        return view('admin.banner.banner_view')->with('banners', $banners);
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
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('BANNER_ID', $id)
                    ->get();

        //
        return view('admin.banner.banner_edit')->with('banners', $banners);
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
            'banner_title' => 'required',
            'details' => 'required',
            'page_name' => 'required',
            'location' => 'required',
            'banner_image' => 'image|nullable',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('banner_image')){
            $filenameWithExt = $request->file('banner_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (1920 width, 800 height)
            $thumbnailpath = 'uploads/images/banner/'.$fileNameToStore;
            $img = Image::make($request->file('banner_image')->getRealPath())->resize(400, null, function ($constraint) { $constraint->aspectRatio(); })->save($thumbnailpath);


            $update = DB::table('nan_banner')
                ->where('BANNER_ID', $id)
                ->update([
                    'BANNER_TITLE' => $request->get('banner_title'),
                    'BANNER_DESC' => $request->get('details'),
                    'IMAGE_PATH' => $fileNameToStore,
                    'PAGE_SHORT_CODE' => $request->get('page_name'),
                    'PAGE_LOC_SHORT_CODE' => $request->get('location'),
                    'SL_NO' => $request->get('serial_no'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        }
        else{

            $update = DB::table('nan_banner')
                ->where('BANNER_ID', $id)
                ->update([
                    'BANNER_TITLE' => $request->get('banner_title'),
                    'BANNER_DESC' => $request->get('details'),
                    'PAGE_SHORT_CODE' => $request->get('page_name'),
                    'PAGE_LOC_SHORT_CODE' => $request->get('location'),
                    'SL_NO' => $request->get('serial_no'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);
            
        }

        Session::flash('success', 'Banner Updated Successfully!'); 

        //
        return redirect()->route('banner.edit', [$id]);
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
        $banners = DB::table('nan_banner')
                ->select('nan_banner.*')
                ->where('nan_banner.BANNER_ID', '=', $id)
                ->get();

        foreach( $banners as $banner ){
            if ($banner->ACTIVE_STATUS == '1') {
                $update = DB::table('nan_banner')
                        ->where('BANNER_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($banner->ACTIVE_STATUS == '0') {
                $update = DB::table('nan_banner')
                        ->where('BANNER_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('BANNER_ID', $id)
                    ->paginate(1);

        //
        return view('admin.banner.banner_list')->with('banners', $banners);

    }
}
