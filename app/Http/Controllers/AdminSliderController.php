<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminSliderController extends Controller
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
        $slides = DB::table('nan_slide_image')
                    ->select('nan_slide_image.*')
                    ->where('IMAGE_TITLE', 'LIKE', '%'.$request->get('slide_title').'%')
                    ->orderBy('SLIDE_IMAGE_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.slider.slider_list')->with('slides', $slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slider.slider_create');
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
            'slide_title' => 'required',
            'slide_image' => 'image|required',
        ]);

        // Primary Key Generator
        $primary_key = DB::table('nan_slide_image')
                    ->select('nan_slide_image.SLIDE_IMAGE_ID')
                    ->max('SLIDE_IMAGE_ID');

        if (isset($primary_key)) {
            $slide_id = $primary_key + '1';
        }
        else {
            $slide_id = '20190001';
        }


        // image upload, fit and store inside public folder 
        if($request->hasFile('slide_image')){
            $filenameWithExt = $request->file('slide_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('slide_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (1920 width, 800 height)
            $thumbnailpath = 'uploads/images/slide/'.$fileNameToStore;
            $img = Image::make($request->file('slide_image')->getRealPath())->fit(1920, 800, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        $insert = DB::table('nan_slide_image')
            ->insert([
                'SLIDE_IMAGE_ID' => $slide_id,
                'IMAGE_TITLE' => $request->get('slide_title'),
                'IMAGE_DESC' => $request->get('content'),
                'IMAGE_PATH' => $fileNameToStore,
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Slide Created Successfully!'); 

        //
        return redirect()->route('slide.create');

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
        $slides = DB::table('nan_slide_image')
                    ->select('nan_slide_image.*')
                    ->where('SLIDE_IMAGE_ID', $id)
                    ->get();

        //
        return view('admin.slider.slider_view')->with('slides', $slides);
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
        $slides = DB::table('nan_slide_image')
                    ->select('nan_slide_image.*')
                    ->where('SLIDE_IMAGE_ID', $id)
                    ->get();

        //
        return view('admin.slider.slider_edit')->with('slides', $slides);
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
            'slide_title' => 'required',
            'slide_image' => 'image|nullable',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('slide_image')){
            $filenameWithExt = $request->file('slide_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('slide_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (1920 width, 800 height)
            $thumbnailpath = 'uploads/images/slide/'.$fileNameToStore;
            $img = Image::make($request->file('slide_image')->getRealPath())->fit(1920, 800, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);


            $update = DB::table('nan_slide_image')
                ->where('SLIDE_IMAGE_ID', $id)
                ->update([
                    'IMAGE_TITLE' => $request->get('slide_title'),
                    'IMAGE_DESC' => $request->get('content'),
                    'IMAGE_PATH' => $fileNameToStore,
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        }
        else{

            $update = DB::table('nan_slide_image')
                ->where('SLIDE_IMAGE_ID', $id)
                ->update([
                    'IMAGE_TITLE' => $request->get('slide_title'),
                    'IMAGE_DESC' => $request->get('content'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);
            
        }

        Session::flash('success', 'Slide Updated Successfully!'); 

        //
        return redirect()->route('slide.edit', [$id]);
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
        $slides = DB::table('nan_slide_image')
                ->select('nan_slide_image.*')
                ->where('nan_slide_image.SLIDE_IMAGE_ID', '=', $id)
                ->get();

        foreach( $slides as $slide ){
            if ($slide->ACTIVE_STATUS == '1') {
                $update = DB::table('nan_slide_image')
                        ->where('SLIDE_IMAGE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($slide->ACTIVE_STATUS == '0') {
                $update = DB::table('nan_slide_image')
                        ->where('SLIDE_IMAGE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $slides = DB::table('nan_slide_image')
                    ->select('nan_slide_image.*')
                    ->where('SLIDE_IMAGE_ID', $id)
                    ->paginate(1);

        //
        return view('admin.slider.slider_list')->with('slides', $slides);

    }
}
