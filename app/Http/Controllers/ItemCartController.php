<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ItemCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get session id
        $session_id = session()->getId();

        
        //
        $cart_items = DB::table('nan_cart')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', '=', 'nan_cart.PRODUCT_ID')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_cart.*', 'nan_product.PRODUCT_NAME', 'nan_product.IMAGE_PATH', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_cart.SESSION_ID', $session_id)
                    ->where('nan_cart.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('CART_ID', 'ASC')
                    ->get();

        //
        return view('order')->with('cart_items', $cart_items);
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
        $pro_id = '';
        $pro_color = '';
        $pro_size = '';
        $pro_qty = 1.00;

        $pro_id = $request->get('pro_id');
        $pro_color = $request->get('pro_color');
        $pro_size = $request->get('pro_size');
        $pro_qty = $request->get('pro_qty');


        //Get session id
        $session_id = session()->getId();


        $cart_list = DB::table('nan_cart')
                    ->select('nan_cart.*')
                    ->where('PRODUCT_ID', $pro_id)
                    ->get();

        // Check already added in cart or not
        if(count($cart_list) < 1)
        {

            // Primary Key Generator for Color Table
            $primary_key = DB::table('nan_cart')
                        ->select('nan_cart.CART_ID')
                        ->max('CART_ID');

            if (isset($primary_key)) {
                $cart_id = $primary_key + '1';
            }
            else {
                $cart_id = '20190001';
            }

            // Insert Cart Item
            $insert = DB::table('nan_cart')
                ->insert([
                    'CART_ID' => $cart_id,
                    'SESSION_ID' => $session_id,
                    'CART_DATE' => Carbon::now(),
                    'PRODUCT_ID' => $pro_id,
                    'PRODUCT_COLOR_ID' => $pro_color,
                    'PRODUCT_SIZE_ID' => $pro_size,
                    'QTY' => $pro_qty,
                    'ACTIVE_STATUS' => '1',
                    'ENTRY_TIMESTAMP' => Carbon::now()
                ]);

        }


        


        $data = '<button class="product-button product-card" disabled="disabled" style="background: #895a6b; border-color: #895a6b;"><i class="fas fa-shopping-cart"></i> Cart Added</button>';


        //Get session id
        $session_id = session()->getId();


        $cart_items = DB::table('nan_cart')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', '=', 'nan_cart.PRODUCT_ID')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_cart.*', 'nan_product.PRODUCT_NAME', 'nan_product.IMAGE_PATH', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_cart.SESSION_ID', $session_id)
                    ->where('nan_cart.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('CART_ID', 'ASC')
                    ->get();


        $cart = view('cart_items',compact('cart_items'))->render();
        //
        return response()->json(['values'=> $data, 'cart'=> $cart]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        //
        $cart_id = '';

        $cart_id = $request->get('cart_id');


        // Delete Cart Item
        $delete = DB::table('nan_cart')
                ->where('CART_ID', '=', $cart_id)
                ->delete();

        //Get session id
        $session_id = session()->getId();


        $cart_items = DB::table('nan_cart')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', '=', 'nan_cart.PRODUCT_ID')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_cart.*', 'nan_product.PRODUCT_NAME', 'nan_product.IMAGE_PATH', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_cart.SESSION_ID', $session_id)
                    ->where('nan_cart.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('CART_ID', 'ASC')
                    ->get();


        $data = view('cart_items',compact('cart_items'))->render();
        $page_data = view('cart_page_items',compact('cart_items'))->render();
        //
        return response()->json(['values'=> $data, 'page_data'=> $page_data]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function buttton(Request $request)
    {
        //Get session id
        $session_id = session()->getId();

        //
        $cart_items = DB::table('nan_cart')
                    ->join('nan_product', 'nan_product.PRODUCT_ID', '=', 'nan_cart.PRODUCT_ID')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_cart.*', 'nan_product.PRODUCT_NAME', 'nan_product.IMAGE_PATH', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_cart.SESSION_ID', $session_id)
                    ->where('nan_cart.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('CART_ID', 'ASC')
                    ->get();


        $data = view('cart_items',compact('cart_items'))->render();
        //
        return response()->json(['values'=> $data]);
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
