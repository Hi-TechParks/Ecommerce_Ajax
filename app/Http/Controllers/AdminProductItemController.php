<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use File;
use DB;

class AdminProductItemController extends Controller
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
        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_brand', 'nan_brand.BRAND_ID', '=', 'nan_product.BRAND_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_brand.BRAND_NAME')
                    ->where('nan_product.PRODUCT_NAME', 'LIKE', '%'.$request->get('product_name').'%')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.item.item_list')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = DB::table('nan_product_category')
                    ->select('nan_product_category.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('CATEGORY_NAME', 'ASC')
                    ->get();

        //
        $brands = DB::table('nan_brand')
                    ->select('nan_brand.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('BRAND_NAME', 'ASC')
                    ->get();

        //
        return view('admin.item.item_create')
                            ->with('categories', $categories)
                            ->with('brands', $brands);
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
            'category_name' => 'required',
            'product_name' => 'required',
            'brand_name' => 'required',
            'content' => 'required',
            'item_image' => 'image|required',
        ]);


        $category_id = $request->get('category_name');

        // Primary Key Generator
        $primary_key = DB::table('nan_product')
                    ->select('nan_product.PRODUCT_ID')
                    ->max('PRODUCT_ID');

        if (isset($primary_key)) {
            $product_id = $primary_key + '1';
        }
        else {
            $product_id = '20190001';
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


        $insert = DB::table('nan_product')
            ->insert([
                'PRODUCT_ID' => $product_id,
                'PRODUCT_NAME' => $request->get('product_name'),
                'PRODUCT_CATEGORY_ID' => $request->get('category_name'),
                'SHORT_CODE' => $request->get('short_code'),
                'USER_PRODUCT_CODE' => $request->get('product_code'),
                'PRODUCT_DETAILS' => $request->get('content'),
                'BRAND_ID' => $request->get('brand_name'),
                'IMAGE_PATH' => $fileNameToStore,
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);


        Session::flash('success', 'Product Created Successfully!'); 

        //
        return redirect()->route('item.show', [$product_id]);
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
        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_brand', 'nan_brand.BRAND_ID', '=', 'nan_product.BRAND_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_brand.BRAND_NAME')
                    ->where('PRODUCT_ID', $id)
                    ->get();

        //
        return view('admin.item.item_view')->with('items', $items);
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
        $items = DB::table('nan_product')
                    ->select('nan_product.*')
                    ->where('PRODUCT_ID', $id)
                    ->get();

        //
        $categories = DB::table('nan_product_category')
                    ->select('nan_product_category.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('CATEGORY_NAME', 'ASC')
                    ->get();

        //
        $brands = DB::table('nan_brand')
                    ->select('nan_brand.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('BRAND_NAME', 'ASC')
                    ->get();

        //
        return view('admin.item.item_edit')
                            ->with('categories', $categories)
                            ->with('brands', $brands)
                            ->with('items', $items);
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
            'category_name' => 'required',
            'product_name' => 'required',
            'brand_name' => 'required',
            'content' => 'required',
            'item_image' => 'image|nullable',
        ]);



        // image upload, fit and store inside public folder 
        if($request->hasFile('item_image')){
            $filenameWithExt = $request->file('item_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('item_image')->getClientOriginalExtension();
            
            $fileNameToStore = $id.'_'.time().'.'.$extension;
            //Resize And Crop as Fit image here (1920 width, 800 height)
            $newFolder = public_path().'/products/'.$id.'/zoom/';

            /*$newFolder = base_path('/products/'.$category_id.'/'.$id);*/

            File::makeDirectory($newFolder, 0777, true, true);
            

            $thumbnailpath = 'products/'.$id.'/'.$fileNameToStore;
            $img = Image::make($request->file('item_image')->getRealPath())->resize(130, null, function ($constraint) { $constraint->aspectRatio(); })->save($thumbnailpath);

            $zoompath = 'products/'.$id.'/zoom/'.$fileNameToStore;
            $img = Image::make($request->file('item_image')->getRealPath())->resize(500, null, function ($constraint) { $constraint->aspectRatio(); })->save($zoompath);


            $update = DB::table('nan_product')
                ->where('PRODUCT_ID', $id)
                ->update([
                    'PRODUCT_NAME' => $request->get('product_name'),
                    'PRODUCT_CATEGORY_ID' => $request->get('category_name'),
                    'SHORT_CODE' => $request->get('short_code'),
                    'USER_PRODUCT_CODE' => $request->get('product_code'),
                    'PRODUCT_DETAILS' => $request->get('content'),
                    'BRAND_ID' => $request->get('brand_name'),
                    'IMAGE_PATH' => $fileNameToStore,
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        }
        else{
            
            $update = DB::table('nan_product')
                ->where('PRODUCT_ID', $id)
                ->update([
                    'PRODUCT_NAME' => $request->get('product_name'),
                    'PRODUCT_CATEGORY_ID' => $request->get('category_name'),
                    'SHORT_CODE' => $request->get('short_code'),
                    'USER_PRODUCT_CODE' => $request->get('product_code'),
                    'PRODUCT_DETAILS' => $request->get('content'),
                    'BRAND_ID' => $request->get('brand_name'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);
        }



        Session::flash('success', 'Product Updated Successfully!'); 

        //
        return redirect()->route('item.edit', [$id]);
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
        $items = DB::table('nan_product')
                ->select('nan_product.*')
                ->where('nan_product.PRODUCT_ID', '=', $id)
                ->get();

        foreach( $items as $item ){
            if ($item->ACTIVE_STATUS == '1') {
                $update = DB::table('nan_product')
                        ->where('PRODUCT_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($item->ACTIVE_STATUS == '0') {
                $update = DB::table('nan_product')
                        ->where('PRODUCT_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_brand', 'nan_brand.BRAND_ID', '=', 'nan_product.BRAND_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_brand.BRAND_NAME')
                    ->where('PRODUCT_ID', $id)
                    ->paginate(1);

        //
        return view('admin.item.item_list')->with('items', $items);

    }
}
