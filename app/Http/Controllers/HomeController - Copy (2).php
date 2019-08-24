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
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(2);


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
        return view('index')->with('slides', $slides)
                            ->with('items', $items)
                            ->with('categories', $categories)
                            ->with('brands', $brands)
                            ->with('colors', $colors)
                            ->with('sizes', $sizes)
                            ->with('filters', $filters);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pagination()
    {
        //
        $items = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_price', 'nan_product_price.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE')
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(2);

        //
        return view('items')->with('items', $items);
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
                    ->distinct('nan_product.PRODUCT_ID')
                    ->orderBy('nan_product.PRODUCT_ID', 'DESC')
                    ->paginate(2);


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
                    ->paginate(2);

        //
        return view('items')->with('items', $items);

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
                    ->distinct('nan_product.PRODUCT_ID')
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
                    ->distinct('nan_product.PRODUCT_ID')
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
                    ->select('nan_product.*', 'nan_product_category.CATEGORY_NAME', 'nan_product_price.PRICE', 'nan_product_size.SIZE')
                    ->where('nan_product_size.SIZE', $request->get('pro_size'))
                    ->where('nan_product.ACTIVE_STATUS', '1')
                    ->where('nan_product_price.ACTIVE_STATUS', '1')
                    ->distinct('nan_product.PRODUCT_ID')
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
    public function proPrice(Request $request)
    {
        // must use get option for get data from ajax
        //$data = $request->get('pro_category');
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
        /*$brands = DB::table('nan_brand')
                    ->select('nan_brand.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('BRAND_NAME', 'ASC')
                    ->get();*/

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

        /*//
        $colors = DB::table('nan_product_color')
                    ->join('nan_color', 'nan_color.COLOR_ID', '=', 'nan_product_color.COLOR_ID')
                    ->distinct('nan_product_color.COLOR_ID')
                    ->select('nan_color.*')
                    ->where('nan_product_color.ACTIVE_STATUS', '1')
                    ->orderBy('nan_color.COLOR_ID', 'ASC')
                    ->get();*/


        $sizes = DB::table('nan_product')
                    ->join('nan_product_category', 'nan_product_category.PRODUCT_CATEGORY_ID', '=', 'nan_product.PRODUCT_CATEGORY_ID')
                    ->join('nan_product_size', 'nan_product_size.PRODUCT_ID', '=', 'nan_product.PRODUCT_ID')
                    ->select('nan_product_size.*', 'nan_product_category.PRODUCT_CATEGORY_ID')
                    ->where('nan_product_category.PRODUCT_CATEGORY_ID', $pro_cate)
                    ->where('nan_product_size.ACTIVE_STATUS', '1')
                    ->orderBy('SIZE', 'ASC')
                    ->distinct('nan_product_size.SIZE')
                    ->get();

        //
        /*$sizes = DB::table('nan_product_size')
                    ->distinct('nan_product_size.SIZE')
                    ->select('nan_product_size.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SIZE', 'ASC')
                    ->get();*/
        


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
                    ->paginate(2);


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
                    ->paginate(2);


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
                    ->paginate(2);


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
                    ->paginate(2);


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
                    ->paginate(2);


        //
        return view('items')->with('items', $items);

    }

}
