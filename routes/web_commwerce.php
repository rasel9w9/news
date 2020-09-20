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
    return view('pages.home');
});*/
//Auth::routes(['register'=>false]);
//FrontEnd routes....
Route::get('/', 'HomeController@index')->name('home');
Route::get('/products_by_category/{id}', 'HomeController@products_by_category');
Route::get('/products_by_manufac/{id}', 'HomeController@products_by_manufacture');
Route::get('/product_by_id/{id}', 'HomeController@product_by_id');
Route::post('/add_to_cart', 'CartController@add_to_cart');
Route::get('/show_cart', 'CartController@show_cart');
Route::get('/clear_cart', 'CartController@clear_cart');
Route::get('/remove_cart/{id}', 'CartController@remove_cart');
//Route::get('/update_cart/{id}/{qty}', 'CartController@update_cart');
Route::post('/update_cart/{id}', 'CartController@update_cart');
Route::get('/show_checkout', 'CheckoutController@index');
Route::get('/userlogin', 'UserController@index');
Route::post('/user_registration', 'UserController@registration');
Route::post('/user_login', 'UserController@user_login');
Route::post('/shipping', 'CheckoutController@shipping');
Route::get('/search/{searchKey}', 'HomeController@search');
Route::get('/price_range/{price1}/{price2}', 'HomeController@price_range');
//FrontEnd routes end


//All Backend routes start...
//Admin Routes....
Route::get('/login',function(){
	if(session('login')==true){
		return redirect('show_dashboard');
	}else{return view('admin_login');}
});
Route::post('/dashboard', 'AdminController@dashboard');
Route::get('/show_dashboard', 'AdminController@show_dashboard')->middleware('login_check');
Route::get('/logout', 'AdminController@logout')->name('logout');
//Admin routes End

//catgory Related Routes..
Route::get('/add_category', 'CategoryController@index');
Route::post('/save_category', 'CategoryController@save_category');
Route::get('/all_categories', 'CategoryController@all_categories');
Route::get('/publication_cat/{id}/{status}', 'CategoryController@publication');
Route::get('/category_delete/{id}', 'CategoryController@category_delete');
Route::get('/edit_category/{id}','CategoryController@edit_category');
Route::post('/update_category/{id}','CategoryController@update_category');
//category routes End

//Manufacture Related Routes
Route::get('/add_manufacture', 'ManufactureController@index');
Route::post('/save_manufacture', 'ManufactureController@save_manufacture');
Route::get('/all_manufactures', 'ManufactureController@all_manufactures');
Route::get('/publication_manu/{id}/{status}', 'ManufactureController@publication');
Route::get('/delete_manufacture/{id}', 'ManufactureController@delete_manufacture');
Route::get('/edit_manufacture/{id}','ManufactureController@edit_manufacture');
Route::post('/update_manufacture/{id}','ManufactureController@update_manufacture');
//Manufacture Routes End

//Products Related Routes
Route::get('/add_product', 'ProductController@index');
Route::post('/save_product', 'ProductController@save_product');
Route::get('/all_products', 'ProductController@all_products');
Route::get('/publication_pro/{id}/{status}', 'ProductController@publication');
Route::get('/delete_product/{id}', 'ProductController@delete_product');
Route::get('/edit_product/{id}','ProductController@edit_product');
Route::post('/update_product/{id}','ProductController@update_product');
//Product Routes End

//slides Related Route Start
Route::get('/add_slide', 'SlideController@index');
Route::post('/save_slide', 'SlideController@save_slide');
Route::get('/all_slides', 'SlideController@all_slides');
Route::get('/publication_slide/{id}/{status}', 'SlideController@publication');
Route::get('/delete_slide/{id}', 'SlideController@delete_slide');
Route::get('/edit_slide/{id}','SlideController@edit_slide');
Route::post('/update_slide/{id}','SlideController@update_slide');
//slides Route End

//Order related routes Start..
Route::get('/waitting_orders', 'OrderController@waitting_orders');
Route::get('/view_order/{oredrId}', 'OrderController@view_order');
Route::get('/send_order/{oredrId}', 'OrderController@send_order');
Route::get('/sent_orders', 'OrderController@sent_orders');
Route::get('/back_order/', 'OrderController@back_order');
Route::get('/backed_orders/', 'OrderController@backed_orders');
Route::get('/delete_order/{oredrId}', 'OrderController@delete_order');
Route::get('/back', 'OrderController@back');
//oredr routes end...

//Cupon Related routes
Route::get('/all_cupons', 'CuponController@all_cupons');
Route::get('/create_cupon', 'CuponController@index');
Route::post('/create_cupon', 'CuponController@create_cupon');
Route::get('/edit_cupon/{cupon_id}', 'CuponController@edit_cupon');
Route::post('/update_cupon/{cupon_id}', 'CuponController@update_cupon')->middleware(['auth', 'password.confirm']);;
Route::get('/apply_cupon/{cuponcode}', 'CuponController@apply_cupon');
//End Cupon Related Routes

//All Backend routes End
Route::get('/test','CheckoutController@test');

//Experiment Routes
Route::get('/sendemail', 'OrderController@sendemail');
Route::get('/test', 'TestController@test');
Route::get('/index', 'CartController@index');
Route::get('/api', 'UserController@api');

