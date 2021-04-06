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

Route::get('/','FrontendController@index');

                                           //***Dashboard***//

Route::group(['middleware' => ['authcheck']], function () {
    //Category routes here
Route::get('/Add/Category', 'CategoryController@Add_Category')->name('category_add');
Route::post('/Add/Category', 'CategoryController@Save_Category')->name('add_category');
Route::get('/manage/Category', 'CategoryController@manage_Category')->name('category_manage');
Route::get('/unpublish/Category/{id}', 'CategoryController@unpublish_category')->name('unpublish_category');
Route::get('/publish/Category/{id}', 'CategoryController@publish_category')->name('publish_category');
Route::get('/delete/Category/{id}', 'CategoryController@category_delete')->name('category_delete');
Route::get('/edit/Category/{id}', 'CategoryController@category_edit')->name('category_edit');
Route::post('/update/Category', 'CategoryController@update_Category')->name('update_category');

//Products route here
Route::get('/Add/Product', 'ProductController@Add_product')->name('product_add');
Route::post('/Save/Product', 'ProductController@product_save')->name('product_save');
Route::get('/manage/Product', 'ProductController@product_manage')->name('product_manage');
Route::get('/unpublish/Product/{id}', 'ProductController@unpublish_product')->name('unpublish_product');
Route::get('/publish/Product/{id}', 'ProductController@publish_product')->name('publish_product');
Route::get('/delete/Product/{id}', 'ProductController@product_delete')->name('product_delete');
Route::get('/edit/Product/{id}', 'ProductController@product_edit')->name('product_edit');
Route::post('/update/Product', 'ProductController@product_update')->name('product_update');
Route::get('/delete/Product_manage', 'ProductController@delete_product_manage')->name('delete_product_manage');
Route::get('/restore/delete_product/{id}', 'ProductController@restore_delete')->name('restore_delete');
Route::get('/parmanent/delete_product/{id}', 'ProductController@parmanent_delete')->name('parmanent_delete');
});




                                          //***Frontend Routes***//
//product,shop routes are here 
Route::get('/product/details/{id}', 'FrontendController@product_details_view')->name('product_details');
Route::get('/shop/view', 'FrontendController@shop_view')->name('shop_view');
Route::get('/category/product/view/{id}', 'FrontendController@show_category_products')->name('show_category_products');
    
//add to cart routes are here
Route::post('/add/cart/product', 'CartController@add_to_cart')->name('add_to_cart');
Route::get('/remove/cart/product/{id}', 'CartController@cart_product_remove')->name('cart_product_remove');
Route::post('/update/cart/product', 'CartController@cart_product_update')->name('cart_product_update');
    
//checkout routes are here
Route::get('/checkout/form/view', 'CheckoutController@customer_form_view')->name('customer_form')->middleware('customerlogincheck');
Route::post('/checkout/form/signup', 'CheckoutController@form_signup')->name('form_signup');

Route::get('/shipping/form', 'CheckoutController@shipping_form_view')->name('shipping_form')->middleware('customernotlogincheck','shippingidcheck');

Route::post('/shipping/info', 'CheckoutController@save_shipping_info')->name('save_shipping_info');
Route::get('/checkout/payment', 'CheckoutController@payment_info_show')->name('payment_info')->middleware('customernotlogincheck');
Route::post('/checkout/payment', 'CheckoutController@order_info_save')->name('order_save');
Route::get('/customer/logout', 'CheckoutController@customer_logout')->name('customer_logout');
Route::post('/customer/login', 'CheckoutController@customer_Login_view')->name('customer_Login');
    
//Order routes are here
Route::get('/order/manage', 'OrderController@order_manage_view')->name('order_manage');
Route::get('/order/details/{id}', 'OrderController@order_details_view')->name('order_details');
Route::get('/order/invoice/{id}', 'OrderController@order_invoice_view')->name('order_invoice');
Route::get('/order/invoice/download/{id}', 'OrderController@order_invoice_download')->name('order_invoice_download');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
