<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        //
        $categories = DB::table('nan_product_category')
                    ->select('nan_product_category.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('CATEGORY_NAME', 'ASC')
                    ->get();

        //return View::share('categories', $categories);

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
                    ->distinct()
                    ->get();

        //
        $items = DB::table('nan_product')
                    ->select('nan_product.*')
                    ->distinct()
                    ->get();

        //
        $shops = DB::table('nan_shop')
                    ->select('nan_shop.*')
                    ->where('ACTIVE_STATUS', '1')
                    ->orderBy('SHOP_ID', 'ASC')
                    ->get();

        /*$share_data = array(
            'categories' => $categories,
            'cart_items' => $cart_items,
        );*/

        //View::share('share_data', $share_data);
        View::share(['categories' => $categories, 'cart_items' => $cart_items, 'items' => $items, 'shops' => $shops]);
    }
}
