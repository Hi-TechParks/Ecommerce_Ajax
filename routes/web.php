<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('index');
});*/
Route::get('/', 'HomeController@index')->name('home');
//Route::get('/item/{id}', 'HomeController@show')->name('home.show');
Route::get('/item/{id}', 'ItemDetailsController@show')->name('item.show');
// Ajax Image load on color + size
//Route::get('/item/colorImage', 'ItemDetailsController@colorImage')->name('item.colorImage');
//Route::get('/item/sizeImage', 'ItemDetailsController@sizeImage')->name('item.sizeImage');
Route::get('/product/colorImage','ItemDetailsController@colorImage');
Route::get('/product/sizeImage','ItemDetailsController@sizeImage');

// Product Shop Filter with Ajax + Pagination
Route::get('/product/shop','HomeController@proShop');


// Product Category Filter with Ajax + Pagination
Route::get('/product/category','HomeController@proCategory');
Route::get('/product/category/pagination','HomeController@proCategoryPage');

// Product Search Filters with Ajax Single Version
Route::get('/product/brand','HomeController@proBrand');
Route::get('/product/color','HomeController@proColor');
Route::get('/product/size','HomeController@proSize');
Route::get('/product/price','HomeController@proPrice');

// Product Search Filters And Pagination with Ajax
Route::get('/product/search','HomeController@search');
// Shop Category Load with Ajax
Route::get('/shop/category','HomeController@shopCate');

// Product Search Filters with Ajax
Route::get('/product/filterAll','HomeController@filterAll');
Route::get('/product/filterSize','HomeController@filterSize');
Route::get('/product/filterColor','HomeController@filterColor');
Route::get('/product/filter','HomeController@filter');


// Product Search Filters And Pagination with Ajax Multiple Version
Route::get('/product/filterAllPage','HomeController@filterAllPage');
Route::get('/product/filterSizePage','HomeController@filterSizePage');
Route::get('/product/filterColorPage','HomeController@filterColorPage');
Route::get('/product/filterPage','HomeController@filterPage');


// Home Page Pagination with Ajax
Route::get('/pagination', 'HomeController@pagination');


// Header Search for Product
Route::get('/search','ArchiveController@index');
// Header Search for Product by Ajax
Route::get('/headersearch','HomeController@headersearch');



// Header Cart Button
Route::get('/cart','ItemCartController@store');
Route::get('/cart/remove','ItemCartController@remove');
Route::get('/cart/buttton','ItemCartController@buttton');

// Cart Page
Route::get('/order','ItemCartController@index');


Route::get('/test','TestController@index');



Route::get('/category', function () {
    return view('category');
});

Route::get('/details', function () {
    return view('details');
});

/*Route::get('/order', function () {
    return view('order');
});*/

/*Route::get('/contact', function () {
    return view('contact');
});*/



// Admin Dashboard
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/table', function () {
    return view('admin.table');
});

Route::get('/form', function () {
    return view('admin.form');
});



// Admin Slider Route
Route::get('/admin/slide', 'AdminSliderController@index')->name('slide.index');
Route::get('/admin/slide/create', 'AdminSliderController@create')->name('slide.create');
Route::post('/admin/slide/store', 'AdminSliderController@store')->name('slide.store');
Route::get('/admin/slide/show/{id}', 'AdminSliderController@show')->name('slide.show');
Route::get('/admin/slide/edit/{id}', 'AdminSliderController@edit')->name('slide.edit');
Route::post('/admin/slide/update/{id}', 'AdminSliderController@update')->name('slide.update');
Route::get('/admin/slide/status/{id}', 'AdminSliderController@status')->name('slide.status');



// Admin Shop Route
Route::get('/admin/shop', 'AdminShopController@index')->name('shop.index');
Route::get('/admin/shop/create', 'AdminShopController@create')->name('shop.create');
Route::post('/admin/shop/store', 'AdminShopController@store')->name('shop.store');
Route::get('/admin/shop/edit/{id}', 'AdminShopController@edit')->name('shop.edit');
Route::post('/admin/shop/update/{id}', 'AdminShopController@update')->name('shop.update');
Route::get('/admin/shop/status/{id}', 'AdminShopController@status')->name('shop.status');




// Admin Product Category Route
Route::get('/admin/product/category', 'AdminProductCategoryController@index')->name('category.index');
Route::get('/admin/product/category/create', 'AdminProductCategoryController@create')->name('category.create');
Route::post('/admin/product/category/store', 'AdminProductCategoryController@store')->name('category.store');
Route::get('/admin/product/category/edit/{id}', 'AdminProductCategoryController@edit')->name('category.edit');
Route::post('/admin/product/category/update/{id}', 'AdminProductCategoryController@update')->name('category.update');
Route::get('/admin/product/category/status/{id}', 'AdminProductCategoryController@status')->name('category.status');



// Admin Product Brand Route
Route::get('/admin/product/brand', 'AdminProductBrandController@index')->name('brand.index');
Route::get('/admin/product/brand/create', 'AdminProductBrandController@create')->name('brand.create');
Route::post('/admin/product/brand/store', 'AdminProductBrandController@store')->name('brand.store');
Route::get('/admin/product/brand/edit/{id}', 'AdminProductBrandController@edit')->name('brand.edit');
Route::post('/admin/product/brand/update/{id}', 'AdminProductBrandController@update')->name('brand.update');
Route::get('/admin/product/brand/status/{id}', 'AdminProductBrandController@status')->name('brand.status');



// Admin Product Color Route
Route::get('/admin/product/color', 'AdminProductColorController@index')->name('color.index');
Route::get('/admin/product/color/create', 'AdminProductColorController@create')->name('color.create');
Route::post('/admin/product/color/store', 'AdminProductColorController@store')->name('color.store');
Route::get('/admin/product/color/edit/{id}', 'AdminProductColorController@edit')->name('color.edit');
Route::post('/admin/product/color/update/{id}', 'AdminProductColorController@update')->name('color.update');
Route::get('/admin/product/color/status/{id}', 'AdminProductColorController@status')->name('color.status');



// Admin Product Route
Route::get('/admin/product/item', 'AdminProductItemController@index')->name('item.index');
Route::get('/admin/product/item/create', 'AdminProductItemController@create')->name('item.create');
Route::post('/admin/product/item/store', 'AdminProductItemController@store')->name('item.store');
Route::get('/admin/product/item/show/{id}', 'AdminProductItemController@show')->name('item.show');
Route::get('/admin/product/item/edit/{id}', 'AdminProductItemController@edit')->name('item.edit');
Route::post('/admin/product/item/update/{id}', 'AdminProductItemController@update')->name('item.update');
Route::get('/admin/product/item/status/{id}', 'AdminProductItemController@status')->name('item.status');



/*Route::get('/admin/product/item/color/create/{id}', 'AdminProductItemController@colorCreate')->name('item.color.create');
Route::post('/admin/product/item/color/store', 'AdminProductItemController@colorStore')->name('item.color.store');
Route::get('/admin/product/item/color/show/{id}', 'AdminProductItemController@colorShow')->name('item.color.show');*/



Route::get('/admin/product/item/color/create/{id}', 'AdminItemColorController@create')->name('item.color.create');
Route::post('/admin/product/item/color/store', 'AdminItemColorController@store')->name('item.color.store');
Route::get('/admin/product/item/color/show/{id}', 'AdminItemColorController@show')->name('item.color.show');
Route::get('/admin/product/item/color/edit/{id}', 'AdminItemColorController@edit')->name('item.color.edit');
Route::post('/admin/product/item/color/update/{id}', 'AdminItemColorController@update')->name('item.color.update');
Route::get('/admin/product/item/color/status/{id}', 'AdminItemColorController@status')->name('item.color.status');


/*Route::get('/admin/product/item/size/create/{id}', 'AdminProductItemController@sizeCreate')->name('item.size.create');
Route::post('/admin/product/item/size/store', 'AdminProductItemController@sizeStore')->name('item.size.store');
Route::get('/admin/product/item/size/show/{id}', 'AdminProductItemController@sizeShow')->name('item.size.show');*/


Route::get('/admin/product/item/size/create/{id}', 'AdminItemSizeController@create')->name('item.size.create');
Route::post('/admin/product/item/size/store', 'AdminItemSizeController@store')->name('item.size.store');
Route::get('/admin/product/item/size/show/{id}', 'AdminItemSizeController@show')->name('item.size.show');
Route::get('/admin/product/item/size/edit/{id}', 'AdminItemSizeController@edit')->name('item.size.edit');
Route::post('/admin/product/item/size/update/{id}', 'AdminItemSizeController@update')->name('item.size.update');
Route::get('/admin/product/item/size/status/{id}', 'AdminItemSizeController@status')->name('item.size.status');



Route::get('/admin/product/item/price/create/{id}', 'AdminItemPriceController@create')->name('item.price.create');
Route::post('/admin/product/item/price/store', 'AdminItemPriceController@store')->name('item.price.store');
Route::get('/admin/product/item/price/show/{id}', 'AdminItemPriceController@show')->name('item.price.show');
Route::get('/admin/product/item/price/edit/{id}', 'AdminItemPriceController@edit')->name('item.price.edit');
Route::post('/admin/product/item/price/update/{id}', 'AdminItemPriceController@update')->name('item.price.update');
Route::get('/admin/product/item/price/status/{id}', 'AdminItemPriceController@status')->name('item.price.status');




Route::get('/admin/offer', 'AdminOfferController@index')->name('offer.index');
Route::get('/admin/offer/create', 'AdminOfferController@create')->name('offer.create');
Route::post('/admin/offer/store', 'AdminOfferController@store')->name('offer.store');
Route::get('/admin/offer/show/{id}', 'AdminOfferController@show')->name('offer.show');
Route::get('/admin/offer/edit/{id}', 'AdminOfferController@edit')->name('offer.edit');
Route::post('/admin/offer/update/{id}', 'AdminOfferController@update')->name('offer.update');




Route::get('/admin/offer/category/{id}', 'AdminOfferCategoryController@index')->name('offer.category.index');
Route::get('/admin/offer/category/create', 'AdminOfferCategoryController@create')->name('offer.category.create');
Route::post('/admin/offer/category/store', 'AdminOfferCategoryController@store')->name('offer.category.store');
Route::get('/admin/offer/category/show/{id}', 'AdminOfferCategoryController@show')->name('offer.category.show');
Route::get('/admin/offer/category/edit/{id}', 'AdminOfferCategoryController@edit')->name('offer.category.edit');
Route::post('/admin/offer/category/update/{id}', 'AdminOfferCategoryController@update')->name('offer.category.update');



// Admin Contact Email Route
Route::get('/admin/email', 'AdminContactEmailController@index')->name('email.index');
Route::get('/contact', 'AdminContactEmailController@create')->name('email.create');
Route::post('/admin/email/store', 'AdminContactEmailController@store')->name('email.store');
Route::get('/admin/email/show/{id}', 'AdminContactEmailController@show')->name('email.show');
Route::get('/admin/email/status/{id}', 'AdminContactEmailController@status')->name('email.status');



// Admin Banner Route
Route::get('/admin/banner', 'AdminBannerController@index')->name('banner.index');
Route::get('/admin/banner/create', 'AdminBannerController@create')->name('banner.create');
Route::post('/admin/banner/store', 'AdminBannerController@store')->name('banner.store');
Route::get('/admin/banner/show/{id}', 'AdminBannerController@show')->name('banner.show');
Route::get('/admin/banner/edit/{id}', 'AdminBannerController@edit')->name('banner.edit');
Route::post('/admin/banner/update/{id}', 'AdminBannerController@update')->name('banner.update');
Route::get('/admin/banner/status/{id}', 'AdminBannerController@status')->name('banner.status');



Auth::routes();
