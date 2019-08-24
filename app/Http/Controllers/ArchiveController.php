<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $category_name = $request->get('category_name');
        $product_name = $request->get('product_name');

        //
        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_category.PRODUCT_CATEGORY_ID', 'nan_product_price.PRICE')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', 'LIKE', '%'.$request->get('category_name').'%')
                    ->where('nan_product.PRODUCT_NAME', 'LIKE', '%'.$request->get('product_name').'%')
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(20);


        $categories_msg = DB::table('nan_product_category')
                    ->select('nan_product_category.*')
                    ->where('PRODUCT_CATEGORY_ID', $category_name)
                    ->get();

        //
        $filters = DB::table('nan_product')
                    ->leftJoin('nan_product_color', 'nan_product.PRODUCT_ID', '=', 'nan_product_color.PRODUCT_ID')
                    ->leftJoin('nan_color', 'nan_color.COLOR_ID', '=', 'nan_product_color.COLOR_ID')
                    ->leftJoin('nan_product_size', 'nan_product.PRODUCT_ID', '=', 'nan_product_size.PRODUCT_ID')
                    ->select('nan_product.BRAND_ID', 'nan_color.COLOR_ID', 'nan_product_size.SIZE', 'nan_product_size.PRODUCT_SIZE_ID')
                    ->groupBy('nan_product.BRAND_ID')
                    ->groupBy('nan_product_size.SIZE')
                    ->groupBy('nan_product_color.COLOR_ID')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->get();

        //return $filters;

        //
        return view('archive')
                ->with('items', $items)
                ->with('categories_msg', $categories_msg)
                ->with('category_name', $category_name)
                ->with('product_name', $product_name)
                ->with('filters', $filters);
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
