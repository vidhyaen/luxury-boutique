<?php

use App\Http\Controllers\ColorController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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
#login
Route::get('/', 'LoginController@index')->name('login');
Route::post('/', 'LoginController@check')->name('login.submit');
#userregister
Route::get('register', 'LoginController@show')->name('register');
Route::post('register', 'LoginController@create')->name('register.submit');
Route::get('forgetpassword','PasswordController@index')->name('forget');
Route::get('changepassword','PasswordController@changepassword')->name('change-password');

#home page
Route::group(['middleware' => ['user']], function () {
    Route::get('home', 'SearchController@home')->name('home');

    Route::get('myprofile', 'MyAccountController@myprofile')->name('myprofile');
    Route::get('myorder', 'MyOrderController@index')->name('myorders');
    Route::get('info/{id}', 'MyOrderController@info')->name('info');
    Route::post('changestatus/{id}', 'MyOrderController@changestatus')->name('changestatus');
    Route::post('myprofile/{id}/edit', 'MyAccountController@profileedit')->name('profile.submit');
    Route::get('detail/{id}', 'ProductController@Imagedetail')->name('detail');
    Route::get('cart', 'CartController@cart')->name('cart');
    Route::post('cart','CartController@addTocart')->name('add-to-cart');
    Route::post('cartupdate/{id}', 'CartController@cartUpdate')->name('cart-update');
    Route::get('cartremove/{id}', 'CartController@cartRemove')->name('cart-remove');
    Route::get('feedback', 'MyAccountController@feedback')->name('feedback');
    Route::post('feedback', 'MyAccountController@store')->name('feedback.submit');
    #payment
    Route::get('checkout', 'CheckoutController@checkout')->name('checkout');
    Route::post('checkout', 'CheckoutController@afterpayment')->name('checkout.credit-card');
    Route::post('placeorder', 'CheckoutController@placeOrder')->name('placeorder');
    Route::get('paysuccess', 'CheckoutController@paysuccess')->name('paysuccess');
    Route::get('invoice', 'CheckoutController@invoice')->name('invoice');
});


#admin login,logout
Route::get('admin', 'AdminController@index')->name('admin');
Route::post('admin', 'AdminController@create')->name('adminlogin.submit');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

Route::get('product-image/{filename}', function ($filename) {
    $pathToFile = storage_path('app/product-image/' . $filename);
    if (!File::exists($pathToFile)) {
        abort(404);
    }
    return response()->file($pathToFile, ['Content-Type' => File::mimeType($pathToFile)]);
});


Route::group(['middleware' => ['admin']], function () {

    #dashboard page
    Route::get('admin/index', 'AdminProductController@charts')->name('admin.index');
    Route::get('admin/products', 'AdminProductController@index')->name('admin.product.list');
    #customer detail page
    Route::get('admin/customer', 'AdminProductController@show')->name('admin.customer.list');

    # size variant page
    Route::get('admin/sizevariant', 'SizeController@size')->name('admin.sizevariant');
    Route::get('admin/addsizevariant', 'SizeController@create')->name('addsize');
    Route::post('admin/addsizevariant', 'SizeController@add')->name('size.submit');
    #Editing size varaint
    Route::get('admin/{id}/edit', 'SizeController@show')->name('editsize');
    Route::post('admin/{id}/edit', 'SizeController@edit')->name('edit.submit');
    #deleting size varaint
    Route::post('admin/{id}/delete', 'SizeController@destroy')->name('size.delete');
    #product upload and their details
    Route::get('admin/addproduct', 'ProductController@index')->name('addproduct');
    Route::post('admin/addproduct', 'ProductController@create')->name('addproduct.submit');
    #product details in admin side
    Route::get('admin/productdetail', 'ProductController@Productdetail')->name('Productdetail');
    Route::get('admin/stock', 'StockController@stock')->name('stock');
    Route::get('admin/editstock', 'StockController@editstock')->name('editstock');

    #editing product
    Route::get('admin/{id}/editproduct', 'ProductController@view')->name('viewproduct');
    Route::post('admin/{id}/editproduct', 'ProductController@edit')->name('product.submit');
    #product deleting
    Route::post('admin/{id}/deleteproduct', 'ProductController@destroy')->name('product.delete');
    #category variant page
    Route::get('admin/category', 'CategoryController@index')->name('category');
    Route::get('admin/addcategory', 'CategoryController@create')->name('addcategory');
    Route::post('admin/addcategory', 'CategoryController@store')->name('category.submit');
    #Editing category varaint
    Route::get('admin/{id}/editcategory', 'CategoryController@show')->name('editcategory');
    Route::post('admin/{id}/editcategory', 'CategoryController@edit')->name('editcategory.submit');
    #deleting category varaint
    Route::post('admin/{id}/deletecategory', 'CategoryController@destroy')->name('category.delete');
    #color variant page
    Route::get('admin/color', 'ColorController@index')->name('color');
    Route::get('admin/addcolor', 'ColorController@create')->name('addcolor');
    Route::post('admin/addcolor', 'ColorController@store')->name('color.submit');
    #Editing color
    Route::get('admin/{id}/editcolor', 'ColorController@show')->name('editcolor');
    Route::post('admin/{id}/editcolor', 'ColorController@edit')->name('editcolor.submit');
    #deleting color varaint
    Route::post('admin/{id}/deletecolor', 'ColorController@destroy')->name('color.delete');
    Route::get('admin/cartdetails', 'CartController@cartdetails')->name('cartdetails');
    #status
    Route::get('admin/status', 'OrderstatusController@status')->name('status');
    Route::get('admin/addstatus', 'OrderstatusController@Addstatus')->name('addstatus');
    Route::post('admin/addstatus', 'OrderstatusController@store')->name('status.submit');
    #Editing category varaint
    Route::get('admin/{id}/editstatus', 'OrderstatusController@show')->name('editstatus');
    Route::post('admin/{id}/editstatus', 'OrderstatusController@editstatus')->name('editstatus.submit');

   
    Route::get('admin/orders', 'OrderstatusController@create')->name('order');
    Route::get('admin/orderdetails/{id}', 'OrderstatusController@orderdetails')->name('orderdetails');
    Route::post('admin/orderstatus/{id}', 'OrderstatusController@orderstatus')->name('orderstatus');
    #custom search
    Route::get('admin/search', 'SearchController@search')->name('custom_search');
    #frequent click
    Route::get('admin/click', 'FrequentClickController@index')->name('frequent_click');
    Route::get('admin/clickview/{id}', 'FrequentClickController@create')->name('viewclick');
    Route::post('admin/clickview/{id}', 'FrequentClickController@store')->name('click.submit');

    #customer level
    Route::get('admin/addlevel', 'CustomerLevelController@index')->name('customer-form');
    Route::post('admin/addlevel', 'CustomerLevelController@store')->name('level.submit');
    Route::get('admin/{id}/editlevel', 'CustomerLevelController@show')->name('editlevel');
    Route::post('admin/{id}/editlevel', 'CustomerLevelController@edit')->name('editlevel.submit');
    Route::get('admin/customerlevel', 'CustomerLevelController@create')->name('offers');
});
