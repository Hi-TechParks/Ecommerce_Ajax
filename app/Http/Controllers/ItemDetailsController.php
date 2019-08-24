<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ItemDetailsController extends Controller
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
        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_brand', 'nan_brand.BRAND_ID', '=', 'nan_product.BRAND_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_brand.BRAND_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product.PRODUCT_ID', $id)
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
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
        $colors = DB::table('nan_product_color')
                    ->join('nan_color', 'nan_color.COLOR_ID', '=', 'nan_product_color.COLOR_ID')
                    //->join('nan_product', 'nan_product.PRODUCT_ID', '=', 'nan_product_color.PRODUCT_ID')
                    ->select('nan_color.*', 'nan_product_color.PRODUCT_ID')
                    ->where('nan_product_color.PRODUCT_ID', $id)
                    ->where('nan_product_color.ACTIVE_STATUS', '1')
                    ->distinct('nan_product_color.COLOR_ID')
                    ->orderBy('nan_color.COLOR_ID', 'ASC')
                    ->get();

        //
        $sizes = DB::table('nan_product_size')
                    ->distinct('nan_product_size.SIZE')
                    ->select('nan_product_size.*')
                    ->where('nan_product_size.PRODUCT_ID', $id)
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SIZE', 'ASC')
                    ->get();

        //
        return view('details')
                            ->with('items', $items)
                            ->with('filters', $filters)
                            ->with('colors', $colors)
                            ->with('sizes', $sizes);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {
        $pro_id = '';
        $pro_color = '';

        $pro_id = $request->get('pro_id');
        $pro_color = $request->get('pro_color');

        //
        $items = DB::table('nan_product_color')
                    ->select('nan_product_color.*')
                    ->where('nan_product_color.PRODUCT_ID', $pro_id)
                    ->where('nan_product_color.COLOR_ID', $pro_color)
                    ->get();


        $data = view('details_image',compact('items'))->render();
        //
        return response()->json(['values'=> $data]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function colorImage(Request $request)
    {

        $pro_id = '';
        $pro_color = '';

        $pro_id = $request->get('pro_id');
        $pro_color = $request->get('pro_color');

        //
        $items = DB::table('nan_product_color')
                    ->select('nan_product_color.*')
                    ->where('nan_product_color.PRODUCT_ID', $pro_id)
                    ->where('nan_product_color.COLOR_ID', $pro_color)
                    ->get();


        $data = view('details_image',compact('items'))->render();
        //
        return response()->json(['values'=> $data]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sizeImage(Request $request)
    {

        $pro_id = '';
        $pro_size = '';

        $pro_id = $request->get('pro_id');
        $pro_size = $request->get('pro_size');

        //
        $items = DB::table('nan_product_size')
                    ->select('nan_product_size.*')
                    ->where('nan_product_size.PRODUCT_ID', $pro_id)
                    ->where('nan_product_size.SIZE', $pro_size)
                    ->get();


        $data = view('details_image',compact('items'))->render();
        //
        return response()->json(['values'=> $data]);

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
