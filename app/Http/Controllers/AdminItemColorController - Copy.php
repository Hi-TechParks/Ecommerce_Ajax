<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use File;
use DB;

class AdminItemColorController extends Controller
{
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
        $items = DB::table('nan_product')
                    ->select('nan_product.*')
                    ->where('PRODUCT_ID', $id)
                    ->get();
        //
        $colors = DB::table('nan_color')
                    ->select('nan_color.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('COLOR_NAME', 'ASC')
                    ->get();

        //
        return view('admin.item.item_color_create')
                        ->with('items', $items)
                        ->with('colors', $colors);
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
            'color_name' => 'required',
            'item_image' => 'image|required',
        ]);


        $product_id = $request->get('product_id');


        // Primary Key Generator for Color Table
        $primary_key = DB::table('nan_product_color')
                    ->select('nan_product_color.PRODUCT_COLOR_ID')
                    ->max('PRODUCT_COLOR_ID');

        if (isset($primary_key)) {
            $color_id = $primary_key + '1';
        }
        else {
            $color_id = '20190001';
        }


        // image upload, fit and store inside public folder 
        if($request->hasFile('item_image')){
            $filenameWithExt = $request->file('item_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('item_image')->getClientOriginalExtension();

            $fileNameToStore = $product_id.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (1920 width, 800 height)
            $newFolder = public_path().'/products/'.$product_id.'/';

            /*$newFolder = base_path('/products/'.$category_id.'/'.$product_id);*/

            File::makeDirectory($newFolder, 0777, true, true);
            

            $thumbnailpath = 'products/'.$product_id.'/'.$fileNameToStore;
            $img = Image::make($request->file('item_image')->getRealPath())->fit(130, 200, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        // Insert Product Color
        $insert = DB::table('nan_product_color')
            ->insert([
                'PRODUCT_COLOR_ID' => $color_id,
                'PRODUCT_ID' => $request->get('product_id'),
                'COLOR_ID' => $request->get('color_name'),
                'IMAGE_PATH' => $fileNameToStore,
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);


        Session::flash('success', 'Product Color Created Successfully!'); 

        //
        return redirect()->route('item.color.create', [$product_id]);
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
        $colors = DB::table('nan_product_color')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', 'nan_product_color.PRODUCT_ID')
                    ->join('nan_color', 'nan_color.COLOR_ID', 'nan_product_color.COLOR_ID')
                    ->select('nan_product_color.*', 'nan_product.PRODUCT_NAME', 'nan_color.COLOR_NAME')
                    ->where('nan_product_color.PRODUCT_ID', $id)
                    ->paginate(10);

        //
        return view('admin.item.item_color_list')->with('colors', $colors);
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
        $product_colors = DB::table('nan_product_color')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', 'nan_product_color.PRODUCT_ID')
                    ->select('nan_product_color.*', 'nan_product.PRODUCT_NAME')
                    ->where('nan_product_color.PRODUCT_COLOR_ID', $id)
                    ->get();

        //
        $colors = DB::table('nan_color')
                    ->select('nan_color.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('COLOR_NAME', 'ASC')
                    ->get();

        //
        return view('admin.item.item_color_edit')
                        ->with('product_colors', $product_colors)
                        ->with('colors', $colors);
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
            'color_name' => 'required',
            'item_image' => 'image|nullable',
        ]);


        $product_id = $request->get('product_id');


        // image upload, fit and store inside public folder 
        if($request->hasFile('item_image')){
            $filenameWithExt = $request->file('item_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('item_image')->getClientOriginalExtension();

            $fileNameToStore = $product_id.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (1920 width, 800 height)
            $newFolder = public_path().'/products/'.$product_id.'/';

            /*$newFolder = base_path('/products/'.$category_id.'/'.$product_id);*/

            File::makeDirectory($newFolder, 0777, true, true);
            

            $thumbnailpath = 'products/'.$product_id.'/'.$fileNameToStore;
            $img = Image::make($request->file('item_image')->getRealPath())->fit(130, 200, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);


            // Update Product Color
            $update = DB::table('nan_product_color')
                ->where('PRODUCT_COLOR_ID', $id)
                ->update([
                    'COLOR_ID' => $request->get('color_name'),
                    'IMAGE_PATH' => $fileNameToStore,
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);
        }
        else{
            
            // Update Product Color
            $update = DB::table('nan_product_color')
                ->where('PRODUCT_COLOR_ID', $id)
                ->update([
                    'COLOR_ID' => $request->get('color_name'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        }


        Session::flash('success', 'Product Color Updated Successfully!'); 

        //
        return redirect()->route('item.color.edit', [$id]);
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
        $colors = DB::table('nan_product_color')
                ->select('nan_product_color.*')
                ->where('nan_product_color.PRODUCT_COLOR_ID', '=', $id)
                ->get();

        foreach( $colors as $color ){
            if ($color->ACTIVE_STATUS == '1') {
                $update = DB::table('nan_product_color')
                        ->where('PRODUCT_COLOR_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($color->ACTIVE_STATUS == '0') {
                $update = DB::table('nan_product_color')
                        ->where('PRODUCT_COLOR_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


       //
        $colors = DB::table('nan_product_color')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', 'nan_product_color.PRODUCT_ID')
                    ->join('nan_color', 'nan_color.COLOR_ID', 'nan_product_color.COLOR_ID')
                    ->select('nan_product_color.*', 'nan_product.PRODUCT_NAME', 'nan_color.COLOR_NAME')
                    ->where('nan_product_color.PRODUCT_COLOR_ID', $id)
                    ->paginate(1);

        //
        return view('admin.item.item_color_list')->with('colors', $colors);

    }
}
