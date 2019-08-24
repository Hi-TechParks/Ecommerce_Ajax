<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use File;
use DB;

class AdminItemSizeController extends Controller
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
        /*//
        $items = DB::table('nan_product')
                    ->select('nan_product.*')
                    ->where('PRODUCT_ID', $id)
                    ->get();

        //
        return view('admin.item.item_size_create')
                        ->with('items', $items);*/
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
            'product_size' => 'required',
            'item_image' => 'image|required',
        ]);


        $product_id = $request->get('product_id');


        // Primary Key Generator for Color Table
        $primary_key = DB::table('nan_product_size')
                    ->select('nan_product_size.PRODUCT_SIZE_ID')
                    ->max('PRODUCT_SIZE_ID');

        if (isset($primary_key)) {
            $size_id = $primary_key + '1';
        }
        else {
            $size_id = '20190001';
        }


        // image upload, fit and store inside public folder 
        if($request->hasFile('item_image')){
            $filenameWithExt = $request->file('item_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('item_image')->getClientOriginalExtension();

            $fileNameToStore = $product_id.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (1920 width, 800 height)
            $newFolder = public_path().'/products/'.$product_id.'/zoom/';

            /*$newFolder = base_path('/products/'.$category_id.'/'.$product_id);*/

            File::makeDirectory($newFolder, 0777, true, true);
            

            $thumbnailpath = 'products/'.$product_id.'/'.$fileNameToStore;
            $img = Image::make($request->file('item_image')->getRealPath())->resize(130, null, function ($constraint) { $constraint->aspectRatio(); })->save($thumbnailpath);


            $zoompath = 'products/'.$product_id.'/zoom/'.$fileNameToStore;
            $img = Image::make($request->file('item_image')->getRealPath())->resize(500, null, function ($constraint) { $constraint->aspectRatio(); })->save($zoompath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        // Insert Product Size
        $insert = DB::table('nan_product_size')
            ->insert([
                'PRODUCT_SIZE_ID' => $size_id,
                'PRODUCT_ID' => $request->get('product_id'),
                'SIZE' => $request->get('product_size'),
                'IMAGE_PATH' => $fileNameToStore,
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);


        Session::flash('success', 'Product Size Created Successfully!'); 

        //
        return redirect()->route('item.size.show', [$product_id]);
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
        $sizes = DB::table('nan_product_size')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', 'nan_product_size.PRODUCT_ID')
                    ->select('nan_product_size.*', 'nan_product.PRODUCT_NAME')
                    ->where('nan_product_size.PRODUCT_ID', $id)
                    ->orderBy('nan_product_size.PRODUCT_SIZE_ID', 'DESC')
                    ->paginate(10);

        //
        $items = DB::table('nan_product')
                    ->select('nan_product.*')
                    ->where('PRODUCT_ID', $id)
                    ->get();

        //
        return view('admin.item.item_size_list')
                                ->with('sizes', $sizes)
                                ->with('items', $items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*//
        $product_sizes = DB::table('nan_product_size')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', 'nan_product_size.PRODUCT_ID')
                    ->select('nan_product_size.*', 'nan_product.PRODUCT_NAME')
                    ->where('nan_product_size.PRODUCT_SIZE_ID', $id)
                    ->get();

        //
        return view('admin.item.item_size_edit')
                        ->with('product_sizes', $product_sizes);*/
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
            'product_size' => 'required',
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
            $newFolder = public_path().'/products/'.$product_id.'/zoom/';

            /*$newFolder = base_path('/products/'.$category_id.'/'.$product_id);*/

            File::makeDirectory($newFolder, 0777, true, true);
            

            $thumbnailpath = 'products/'.$product_id.'/'.$fileNameToStore;
            $img = Image::make($request->file('item_image')->getRealPath())->resize(130, null, function ($constraint) { $constraint->aspectRatio(); })->save($thumbnailpath);


            $zoompath = 'products/'.$product_id.'/zoom/'.$fileNameToStore;
            $img = Image::make($request->file('item_image')->getRealPath())->resize(500, null, function ($constraint) { $constraint->aspectRatio(); })->save($zoompath);


            // Update Product Size
            $update = DB::table('nan_product_size')
                ->where('PRODUCT_SIZE_ID', $id)
                ->update([
                    'SIZE' => $request->get('product_size'),
                    'IMAGE_PATH' => $fileNameToStore,
                    'ACTIVE_STATUS' => $request->get('active_status'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        }
        else{
            
            // Update Product Size
            $update = DB::table('nan_product_size')
                ->where('PRODUCT_SIZE_ID', $id)
                ->update([
                    'SIZE' => $request->get('product_size'),
                    'ACTIVE_STATUS' => $request->get('active_status'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        }


        Session::flash('success', 'Product Size Updated Successfully!'); 

        //
        return redirect()->route('item.size.show', [$product_id]);
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
        /*//
        $sizes = DB::table('nan_product_size')
                ->select('nan_product_size.*')
                ->where('nan_product_size.PRODUCT_SIZE_ID', '=', $id)
                ->get();

        foreach( $sizes as $size ){
            if ($size->ACTIVE_STATUS == '1') {
                $update = DB::table('nan_product_size')
                        ->where('PRODUCT_SIZE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($size->ACTIVE_STATUS == '0') {
                $update = DB::table('nan_product_size')
                        ->where('PRODUCT_SIZE_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $sizes = DB::table('nan_product_size')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', 'nan_product_size.PRODUCT_ID')
                    ->select('nan_product_size.*', 'nan_product.PRODUCT_NAME')
                    ->where('nan_product_size.PRODUCT_SIZE_ID', $id)
                    ->paginate(1);

        //
        $items = DB::table('nan_product')
                    ->select('nan_product.*')
                    ->where('PRODUCT_ID', $id)
                    ->get();

        //
        return view('admin.item.item_size_list')
                            ->with('sizes', $sizes)
                            ->with('items', $items);*/

    }
}
