<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //
        $slides = DB::table('nan_slide_image')
                    ->select('nan_slide_image.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SLIDE_IMAGE_ID', 'DESC')
                    ->take(3)
                    ->get();

        //
        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->limit(12)
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
        $colors = DB::table('nan_product_color')
                    ->join('nan_color', 'nan_color.COLOR_ID', '=', 'nan_product_color.COLOR_ID')
                    ->distinct('nan_product_color.COLOR_ID')
                    ->select('nan_color.*')
                    ->where('nan_product_color.ACTIVE_STATUS', '1')
                    ->orderBy('nan_color.COLOR_ID', 'ASC')
                    ->get();

        //
        $sizes = DB::table('nan_product_size')
                    ->select('nan_product_size.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SIZE', 'ASC')
                    ->get();

        //
        return view('index')->with('slides', $slides)
                            ->with('items', $items)
                            ->with('categories', $categories)
                            ->with('brands', $brands)
                            ->with('colors', $colors)
                            ->with('sizes', $sizes);
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
        return view('details')->with('items', $items);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function proCategory(Request $request)
    {
        // must use get option for get data from ajax
        //$data = $request->get('pro_category');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product.PRODUCT_CATEGORY_ID', $request->get('pro_category'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->limit(12)
                    ->get();


        $data = view('items',compact('items'))->render();
        //$data = view('items')->render();

        /*$data = '';

        //        
        foreach ($items as $item) {
            //$data = $item->PRODUCT_CATEGORY_ID;

              $data = '<div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="/item/'.$item->PRODUCT_ID.'">
                      <img src="/products/'.$item->PRODUCT_ID.'/'.$item->IMAGE_PATH.'" class="mx-auto d-block" alt="product">
                    </a>
                  </div>
                  <div class="product-footer">
                    <p class="product-title"><a href="/item/{{ $item->PRODUCT_ID }}">'.$item->PRODUCT_NAME.'</a></p>
                    <div class="product-price">'.$item->PRICE.' <span>(10% Off)</span></div>

                    <div class="footer-product-button">
                      <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                      <a href="#" class="product-button">Buy</a>
                    </div>
                  </div>
                </div>
              </div>';
        }*/

        //
        return response()->json(['values'=> $data]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function proBrand(Request $request)
    {
        // must use get option for get data from ajax
        //$data = $request->get('pro_category');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product.BRAND_ID', $request->get('pro_brand'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->limit(12)
                    ->get();


        $data = view('items',compact('items'))->render();
        //$data = view('items')->render();

        //
        return response()->json(['values'=> $data]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function proColor(Request $request)
    {
        // must use get option for get data from ajax
        //$data = $request->get('pro_category');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->join('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_color.COLOR_ID')
                    ->where('nan_product_color.COLOR_ID', $request->get('pro_color'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->limit(12)
                    ->get();


        $data = view('items',compact('items'))->render();
        //$data = view('items')->render();

        //
        return response()->json(['values'=> $data]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function proSize(Request $request)
    {
        // must use get option for get data from ajax
        //$data = $request->get('pro_category');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->join('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_size.PRODUCT_SIZE_ID')
                    ->where('nan_product_size.PRODUCT_SIZE_ID', $request->get('pro_size'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->limit(12)
                    ->get();


        $data = view('items',compact('items'))->render();
        //$data = view('items')->render();

        //
        return response()->json(['values'=> $data]);

    }

}
