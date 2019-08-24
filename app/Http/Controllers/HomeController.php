<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    public function dateFormat(){
        $today = Carbon::now();
        return $today->toDateString();
    }

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

        /*//
        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(20);*/


        //
        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_offer_category', 'nan_offer_category.PRODUCT_CATEGORY_ID', '=', 'nan_product_category.PRODUCT_CATEGORY_ID')
                    ->join('nan_offer', 'nan_offer.OFFER_ID', '=', 'nan_offer_category.PRODUCT_OFFER_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_offer_category.OFFER_PERCENTAGE', 'nan_offer_category.OFFER_GROSS')
                    ->where('nan_offer_category.VALID_FROM_DATE', '<=', $this->dateFormat())
                    ->where('nan_offer_category.VALID_END_DATE', '>=', $this->dateFormat())
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->where('nan_offer.ACTIVE_STATUS', '1')
                    ->where('nan_offer_category.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(20);


        //
        $offers = DB::table('nan_offer')
                    ->select('nan_offer.*')
                    ->where('VALID_FROM_DATE', '<=', $this->dateFormat())
                    ->where('VALID_END_DATE', '>=', $this->dateFormat())
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('OFFER_ID', 'DESC')
                    ->limit(1)
                    ->get();

        /*//
        $cate_offers = DB::table('nan_offer_category')
                    ->join('nan_offer', 'nan_offer.OFFER_ID', '=', 'nan_offer_category.PRODUCT_OFFER_ID')
                    ->select('nan_offer_category.PRODUCT_CATEGORY_ID', 'nan_offer_category.OFFER_PERCENTAGE', 'nan_offer_category.OFFER_GROSS', 'nan_offer.ACTIVE_STATUS', 'nan_offer.CHD_EXIST')
                    ->where('nan_offer_category.VALID_FROM_DATE', '<=', $this->dateFormat())
                    ->where('nan_offer_category.VALID_END_DATE', '>=', $this->dateFormat())
                    ->where('nan_offer.ACTIVE_STATUS', '1')
                    ->where('nan_offer_category.ACTIVE_STATUS', '1')
                    ->orderBy('nan_offer_category.OFFER_CATEGORY_ID', 'DESC')
                    ->get();*/

        //
        $categories = DB::table('nan_product_category')
                    ->select('nan_product_category.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('CATEGORY_NAME', 'ASC')
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
                    ->distinct('nan_product_size.SIZE')
                    ->select('nan_product_size.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SIZE', 'ASC')
                    ->get();

        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();

        //
        $left_banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'L')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(2)
                    ->get();

        //
        return view('index')->with('slides', $slides)
                            ->with('items', $items)
                            ->with('offers', $offers)
                            //->with('cate_offers', $cate_offers)
                            ->with('categories', $categories)
                            ->with('brands', $brands)
                            ->with('colors', $colors)
                            ->with('sizes', $sizes)
                            ->with('filters', $filters)
                            ->with('banners', $banners)
                            ->with('left_banners', $left_banners);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pagination(Request $request)
    {
        //
        $category_name = '';
        $product_name = '';
        $shop_name = '';

        $category_name = $request->get('category_name');
        $product_name = $request->get('product_name');
        $shop_name = $request->get('shop_name');

        //
        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_category.SHOP_ID', 'nan_product_price.PRICE')
                    ->where('nan_product_category.SHOP_ID', 'LIKE', '%'.$shop_name.'%')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', 'LIKE', '%'.$category_name.'%')
                    ->where('nan_product.PRODUCT_NAME', 'LIKE', '%'.$product_name.'%')
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(20);


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();

        //
        return view('items')->with('items', $items)->with('banners', $banners);
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

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product.PRODUCT_CATEGORY_ID', $request->get('pro_category'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(20);

        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();


        $data = view('items',compact('items', 'banners'))->render();

        //
        return response()->json(['values'=> $data]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function proCategoryPage(Request $request)
    {
        // must use get option for get data from ajax

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product.PRODUCT_CATEGORY_ID', $request->get('pro_category'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(20);

        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();

        //
        return view('items')->with('items', $items)->with('banners', $banners);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function proShop(Request $request)
    {
        // must use get option for get data from ajax
        $shop_name = $request->get('shop_name');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_category.SHOP_ID', 'nan_product_price.PRICE')
                    ->where('nan_product_category.SHOP_ID', $request->get('shop_name'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(20);

        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();


        $data = view('items',compact('items', 'banners'))->render();

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

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product.BRAND_ID', $request->get('pro_brand'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->limit(12)
                    ->get();


        $data = view('items',compact('items'))->render();

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

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->join('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_color.COLOR_ID')
                    ->where('nan_product_color.COLOR_ID', $request->get('pro_color'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->limit(12)
                    ->get();


        $data = view('items',compact('items'))->render();

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

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->join('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_size.SIZE')
                    ->where('nan_product_size.SIZE', $request->get('pro_size'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->limit(12)
                    ->get();


        $data = view('items',compact('items'))->render();

        //
        return response()->json(['values'=> $data]);

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function proPrice(Request $request)
    {
        // must use get option for get data from ajax
        $price = $request->get('pro_price');

        list($minprice,$maxprice) = explode(';',$price);

        $items = DB::table('nan_product')
                    //->distinct('nan_product.PRODUCT_ID')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftjoin('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_size.PRODUCT_SIZE_ID')
                    /*->where('nan_product_price.PRICE', '<=', $maxprice)*/
                    ->whereBetween('nan_product_price.PRICE', [$minprice, $maxprice])
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    //->groupBy('nan_product_size.PRODUCT_ID')
                    
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->limit(12)
                    ->distinct('nan_product.PRODUCT_ID')
                    ->get();


        $data = view('items',compact('items'))->render();

        //
        return response()->json(['values'=> $data]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shopCate(Request $request)
    {
        // must use get option for get data from ajax
        $shop_name = $request->get('shop_name');

        //
        $categories = DB::table('nan_product_category')
                    ->select('nan_product_category.*')
                    ->where('SHOP_ID', $shop_name)
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('CATEGORY_NAME', 'ASC')
                    ->get();


        //
        $left_banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'L')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(2)
                    ->get();
        


        $data = view('category_filter',compact('categories', 'left_banners'))->render();

        //
        return response()->json(['values'=> $data]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // must use get option for get data from ajax
        $pro_cate = $request->get('pro_category');

        //
        $brands = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_brand', 'nan_brand.BRAND_ID', '=', 'nan_product.BRAND_ID')
                    ->select('nan_brand.*', 'nan_product_category.PRODUCT_CATEGORY_ID')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', $pro_cate)
                    ->where('nan_brand.ACTIVE_STATUS', '1')
                    ->orderBy('BRAND_NAME', 'ASC')
                    ->distinct('nan_brand.BRAND_ID')
                    ->get();


        //
        $colors = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->join('nan_color', 'nan_color.COLOR_ID', '=', 'nan_product_color.COLOR_ID')
                    ->select('nan_color.*', 'nan_product_category.PRODUCT_CATEGORY_ID')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', $pro_cate)
                    ->where('nan_product_color.ACTIVE_STATUS', '1')
                    ->orderBy('nan_color.COLOR_ID', 'ASC')
                    ->distinct('nan_product_color.COLOR_ID')
                    ->get();


        //
        $sizes = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product_size.*', 'nan_product_category.PRODUCT_CATEGORY_ID')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', $pro_cate)
                    ->where('nan_product_size.ACTIVE_STATUS', '1')
                    ->orderBy('SIZE', 'ASC')
                    ->distinct('nan_product_size.SIZE')
                    ->get();


        $data = view('filters',compact('brands', 'colors', 'sizes'))->render();

        //
        return response()->json(['values'=> $data]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterAll(Request $request)
    {
        // must use get option for get data from ajax

        $price = $request->get('pro_price');

        list($minprice,$maxprice) = explode(';',$price);

        $pro_cate = '';
        $pro_brand = '';
        $pro_color = '';
        $pro_size = '';

        $pro_cate = $request->get('pro_cate');
        $pro_brand = $request->get('pro_brand');
        $pro_color = $request->get('pro_color');
        $pro_size = $request->get('pro_size');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.PRODUCT_CATEGORY_ID', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_size.PRODUCT_SIZE_ID', 'nan_product_size.SIZE', 'nan_product_color.COLOR_ID')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', 'LIKE', '%'.$pro_cate.'%')
                    ->where('nan_product.BRAND_ID', 'LIKE', '%'.$pro_brand.'%')
                    ->where('nan_product_color.COLOR_ID', 'LIKE', '%'.$pro_color.'%')
                    ->where('nan_product_size.SIZE', 'LIKE', '%'.$pro_size.'%')
                    ->whereBetween('nan_product_price.PRICE', [$minprice, $maxprice])
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->paginate(20);


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();


        $data = view('items',compact('items', 'banners'))->render();

        //
        return response()->json(['values'=> $data]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterSize(Request $request)
    {
        // must use get option for get data from ajax

        $price = $request->get('pro_price');

        list($minprice,$maxprice) = explode(';',$price);

        $pro_cate = '';
        $pro_brand = '';
        $pro_size = '';

        $pro_cate = $request->get('pro_cate');
        $pro_brand = $request->get('pro_brand');
        $pro_size = $request->get('pro_size');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.PRODUCT_CATEGORY_ID', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_size.PRODUCT_SIZE_ID', 'nan_product_size.SIZE')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', 'LIKE', '%'.$pro_cate.'%')
                    ->where('nan_product.BRAND_ID', 'LIKE', '%'.$pro_brand.'%')
                    ->where('nan_product_size.SIZE', 'LIKE', '%'.$pro_size.'%')
                    ->whereBetween('nan_product_price.PRICE', [$minprice, $maxprice])
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->paginate(20);


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();

        $data = view('items',compact('items', 'banners'))->render();

        //
        return response()->json(['values'=> $data]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterColor(Request $request)
    {
        // must use get option for get data from ajax

        $price = $request->get('pro_price');

        list($minprice,$maxprice) = explode(';',$price);

        $pro_cate = '';
        $pro_brand = '';
        $pro_color = '';

        $pro_cate = $request->get('pro_cate');
        $pro_brand = $request->get('pro_brand');
        $pro_color = $request->get('pro_color');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.PRODUCT_CATEGORY_ID', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_color.COLOR_ID')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', 'LIKE', '%'.$pro_cate.'%')
                    ->where('nan_product.BRAND_ID', 'LIKE', '%'.$pro_brand.'%')
                    ->where('nan_product_color.COLOR_ID', 'LIKE', '%'.$pro_color.'%')
                    ->whereBetween('nan_product_price.PRICE', [$minprice, $maxprice])
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->paginate(20);


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();


        $data = view('items',compact('items', 'banners'))->render();

        //
        return response()->json(['values'=> $data]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        // must use get option for get data from ajax

        $price = $request->get('pro_price');

        list($minprice,$maxprice) = explode(';',$price);

        $pro_cate = '';
        $pro_brand = '';

        $pro_cate = $request->get('pro_cate');
        $pro_brand = $request->get('pro_brand');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.PRODUCT_CATEGORY_ID', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', 'LIKE', '%'.$pro_cate.'%')
                    ->where('nan_product.BRAND_ID', 'LIKE', '%'.$pro_brand.'%')
                    ->whereBetween('nan_product_price.PRICE', [$minprice, $maxprice])
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->paginate(20);


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();


        $data = view('items',compact('items', 'banners'))->render();

        //
        return response()->json(['values'=> $data]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterAllPage(Request $request)
    {
        // must use get option for get data from ajax

        $price = $request->get('pro_price');

        list($minprice,$maxprice) = explode(';',$price);

        $pro_cate = '';
        $pro_brand = '';
        $pro_color = '';
        $pro_size = '';

        $pro_cate = $request->get('pro_cate');
        $pro_brand = $request->get('pro_brand');
        $pro_color = $request->get('pro_color');
        $pro_size = $request->get('pro_size');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.PRODUCT_CATEGORY_ID', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_size.PRODUCT_SIZE_ID', 'nan_product_size.SIZE', 'nan_product_color.COLOR_ID')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', 'LIKE', '%'.$pro_cate.'%')
                    ->where('nan_product.BRAND_ID', 'LIKE', '%'.$pro_brand.'%')
                    ->where('nan_product_color.COLOR_ID', 'LIKE', '%'.$pro_color.'%')
                    ->where('nan_product_size.SIZE', 'LIKE', '%'.$pro_size.'%')
                    ->whereBetween('nan_product_price.PRICE', [$minprice, $maxprice])
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->paginate(20);


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();


        //
        return view('items')->with('items', $items)->with('banners', $banners);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterSizePage(Request $request)
    {
        // must use get option for get data from ajax

        $price = $request->get('pro_price');

        list($minprice,$maxprice) = explode(';',$price);

        $pro_cate = '';
        $pro_brand = '';
        $pro_size = '';

        $pro_cate = $request->get('pro_cate');
        $pro_brand = $request->get('pro_brand');
        $pro_size = $request->get('pro_size');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.PRODUCT_CATEGORY_ID', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_size.PRODUCT_SIZE_ID', 'nan_product_size.SIZE')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', 'LIKE', '%'.$pro_cate.'%')
                    ->where('nan_product.BRAND_ID', 'LIKE', '%'.$pro_brand.'%')
                    ->where('nan_product_size.SIZE', 'LIKE', '%'.$pro_size.'%')
                    ->whereBetween('nan_product_price.PRICE', [$minprice, $maxprice])
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->paginate(20);


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();


        //
        return view('items')->with('items', $items)->with('banners', $banners);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterColorPage(Request $request)
    {
        // must use get option for get data from ajax

        $price = $request->get('pro_price');

        list($minprice,$maxprice) = explode(';',$price);

        $pro_cate = '';
        $pro_brand = '';
        $pro_color = '';

        $pro_cate = $request->get('pro_cate');
        $pro_brand = $request->get('pro_brand');
        $pro_color = $request->get('pro_color');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.PRODUCT_CATEGORY_ID', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_color.COLOR_ID')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', 'LIKE', '%'.$pro_cate.'%')
                    ->where('nan_product.BRAND_ID', 'LIKE', '%'.$pro_brand.'%')
                    ->where('nan_product_color.COLOR_ID', 'LIKE', '%'.$pro_color.'%')
                    ->whereBetween('nan_product_price.PRICE', [$minprice, $maxprice])
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->paginate(20);


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();


        //
        return view('items')->with('items', $items)->with('banners', $banners);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterPage(Request $request)
    {
        // must use get option for get data from ajax

        $price = $request->get('pro_price');

        list($minprice,$maxprice) = explode(';',$price);

        $pro_cate = '';
        $pro_brand = '';

        $pro_cate = $request->get('pro_cate');
        $pro_brand = $request->get('pro_brand');

        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_color', 'nan_product_color.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->leftJoin('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.PRODUCT_CATEGORY_ID', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', 'LIKE', '%'.$pro_cate.'%')
                    ->where('nan_product.BRAND_ID', 'LIKE', '%'.$pro_brand.'%')
                    ->whereBetween('nan_product_price.PRICE', [$minprice, $maxprice])
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->paginate(20);


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();


        //
        return view('items')->with('items', $items)->with('banners', $banners);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function headersearch(Request $request)
    {
        //
        $category_name = '';
        $product_name = '';

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


        //
        $banners = DB::table('nan_banner')
                    ->select('nan_banner.*')
                    ->where('PAGE_SHORT_CODE', 'H')
                    ->where('PAGE_LOC_SHORT_CODE', 'M')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SL_NO', 'ASC')
                    ->limit(6)
                    ->get();

        //return $filters;

        //
        /*return view('archive')
                ->with('items', $items)
                ->with('categories_msg', $categories_msg)
                ->with('category_name', $category_name)
                ->with('product_name', $product_name)
                ->with('filters', $filters);*/

        $data = view('items',compact('items', 'categories_msg', 'category_name', 'product_name', 'banners'))->render();

        //
        return response()->json(['values'=> $data]);
    }

}
