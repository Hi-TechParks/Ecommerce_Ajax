<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use DB;

class AdminProductCategoryController extends Controller
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
        $categories = DB::table('nan_product_category')
                    ->leftjoin('nan_shop', 'nan_shop.SHOP_ID', '=', 'nan_product_category.SHOP_ID')
                    ->select('nan_product_category.*', 'nan_shop.SHOP_NAME')
                    ->where('CATEGORY_NAME', 'LIKE', '%'.$request->get('category_title').'%')
                    ->orderBy('PRODUCT_CATEGORY_ID', 'DESC')
                    ->paginate(10);

        //
        return view('admin.category.category_list')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $shops = DB::table('nan_shop')
                    ->select('nan_shop.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SHOP_ID', 'DESC')
                    ->get();
        //
        return view('admin.category.category_create')->with('shops', $shops);
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
            'category' => 'required',
        ]);

        //Primary Key Generator
        $primary_key = DB::table('nan_product_category')
                    ->select('nan_product_category.PRODUCT_CATEGORY_ID')
                    ->max('PRODUCT_CATEGORY_ID');

        if (isset($primary_key)) {
            $category_id = $primary_key + '1';
        }
        else {
            $category_id = '20190001';
        }


        $insert = DB::table('nan_product_category')
            ->insert([
                'PRODUCT_CATEGORY_ID' => $category_id,
                'CATEGORY_NAME' => $request->get('category'),
                'SHORT_CODE' => $request->get('short_code'),
                'SHOP_ID' => $request->get('shop_name'),
                'ACTIVE_STATUS' => '1',
                'ENTERED_BY' => Auth::user()->id,
                'ENTRY_TIMESTAMP' => Carbon::now()
            ]);

        Session::flash('success', 'Category Created Successfully!'); 

        //
        return redirect()->route('category.create');
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
        $categories = DB::table('nan_product_category')
                    ->select('nan_product_category.*')
                    ->where('PRODUCT_CATEGORY_ID', $id)
                    ->get();

        //
        $shops = DB::table('nan_shop')
                    ->select('nan_shop.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SHOP_ID', 'DESC')
                    ->get();

        //
        return view('admin.category.category_edit')->with('categories', $categories)->with('shops', $shops);
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
            'category' => 'required',
        ]);


        $update = DB::table('nan_product_category')
                ->where('PRODUCT_CATEGORY_ID', $id)
                ->update([
                    'CATEGORY_NAME' => $request->get('category'),
                    'SHORT_CODE' => $request->get('short_code'),
                    'SHOP_ID' => $request->get('shop_name'),
                    'UPDATED_BY' => Auth::user()->id,
                    'UPDATE_TIMESTAMP' => Carbon::now()
                ]);

        Session::flash('success', 'Category Updated Successfully!'); 

        //
        return redirect()->route('category.edit', [$id]);
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
        $categories = DB::table('nan_product_category')
                ->select('nan_product_category.*')
                ->where('nan_product_category.PRODUCT_CATEGORY_ID', '=', $id)
                ->get();

        foreach( $categories as $category ){
            if ($category->ACTIVE_STATUS == '1') {
                $update = DB::table('nan_product_category')
                        ->where('PRODUCT_CATEGORY_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '0'
                        ]);
            }
            elseif ($category->ACTIVE_STATUS == '0') {
                $update = DB::table('nan_product_category')
                        ->where('PRODUCT_CATEGORY_ID', '=', $id)
                        ->update([
                            'ACTIVE_STATUS' => '1'
                        ]);
            }
        }


        //
        $categories = DB::table('nan_product_category')
                    ->leftjoin('nan_shop', 'nan_shop.SHOP_ID', '=', 'nan_product_category.SHOP_ID')
                    ->select('nan_product_category.*', 'nan_shop.SHOP_NAME')
                    ->where('PRODUCT_CATEGORY_ID', $id)
                    ->paginate(1);

        //
        return view('admin.category.category_list')->with('categories', $categories);

    }
}
