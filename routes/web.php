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
//All FronEnd Controller
Route::get('/', 'FrontController@index');
Route::get('/news-view/{id}/{title}','FrontController@news_view_by_id')->name('news_view_by_id');
Route::get('/category/{id}/','FrontController@news_by_category')->name('news_by_category');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/', 'HomeController@index')->name('home');
Route::get('/posts_by_category/{id}', 'HomeController@posts_by_category');
Route::get('/admin/login', 'LoginController@index')->name('admin-login');

Route::prefix('admin')->group(function() {
	Route::post('/login', 'AdminController@login_check')->name('login');
	//Route::get('/alladmin', 'AdminController@alladmins');
	Route::middleware('logincheck')->group(function(){
		Route::get('/logout', 'AdminController@logout')->name('logout');
		Route::get('/show_dashboard', 'AdminController@show_dashboard');
		//catgory Related Routes..
		Route::get('/category', 'CategoryController@index')->name('category');
		Route::post('/save_category', 'CategoryController@save_category');
		Route::get('/all_categories', 'CategoryController@all_categories');
		Route::get('/category/status/{id}/{status}', 'CategoryController@publication')->name('catStatus');
		Route::get('/delete_category/{id}', 'CategoryController@delete_category');
		Route::get('/edit_category/{id}','CategoryController@edit_category');
		Route::post('/update_category/{id}','CategoryController@update_category')->name('updateCat');
		//category routes End

		//Nav Related routes
		Route::get('/nav', 'NavController@index')->name('nav');
		Route::get('/edit_nav/{id}','NavController@edit_category');
		Route::post('/save_nav', 'NavController@save_category');
		Route::get('/all_navs', 'NavController@all_categories');
		Route::get('/nav/status/{id}/{status}', 'NavController@publication')->name('catStatus');
		Route::get('/delete_nav/{id}', 'NavController@delete_category');
		Route::post('/update_nav/{id}','NavController@update_category')->name('updateNav');
		//Nav routes End

		//Post Related Routes
		Route::get('/add_post', 'PostController@index');
		Route::post('/save_post', 'PostController@save_post');
		Route::get('/all_posts', 'PostController@all_posts');
		Route::get('post/status/{id}/{status}', 'PostController@publication')->name('postStatus');
		Route::get('/delete_post/{id}', 'PostController@delete_post');
		Route::get('/edit_post/{id}','PostController@edit_post');
		Route::post('/update_post/{id}','PostController@update_post');
		//Post Related Routes end

		//Meta Related route
		Route::get('/meta', 'MetaController@index');
		Route::post('/save_meta', 'MetaController@save_meta');
		//Meta Related route End

		//Users Related Routes
		Route::get('/user', 'UserController@index');
		Route::post('/save_user', 'UserController@save_user');
		Route::get('/all_users', 'UserController@all_users');
		Route::get('user/status/{id}/{status}', 'UserController@publication')->name('userStatus');
		Route::get('/delete_user/{id}', 'UserController@delete_user');
		Route::get('/edit_user/{id}','UserController@edit_user');
		Route::post('/update_user/{id}','UserController@update_user')->name('updateUser');
		Route::get('/profile','UserController@edit_user')->name('profile');
		//Post Related Routes end
		
		//advertisement Related Routes..
		Route::get('/advertisement', 'AdvertisementController@index')->name('advertisement');
		Route::post('/save_advertisement', 'AdvertisementController@save_advertisement');
		Route::get('/all_advertisements', 'AdvertisementController@all_advertisements');
		Route::get('/advertisement/status/{id}/{status}', 'AdvertisementController@publication')->name('adStatus');
		Route::get('/delete_advertisement/{id}', 'AdvertisementController@delete_advertisement');
		Route::get('/edit_advertisement/{id}','AdvertisementController@edit_advertisement');
		Route::post('/update_advertisement/{id}','AdvertisementController@update_advertisement')->name('updateAd');
		//advertisement routes End

		//Reporter Routes
		Route::get('/reporter', 'ReporterController@index');
		Route::post('/save_reporter', 'ReporterController@save_reporter');
		Route::get('/reporter/status/{id}/{status}', 'ReporterController@publication')->name('reporterStatus');
		Route::get('/edit_reporter/{id}','ReporterController@edit_reporter');
		Route::post('/update_reporter/{id}','ReporterController@update_reporter')->name('updateReporter');
		//Reporters routes End

		//Roll Setting Related Routes
		Route::get('/roll', 'RollController@index');
		Route::get('/save_roll', 'RollController@save_roll');
		Route::post('/update_roll','RollController@update_roll')->name('updateRoll');
		//Roll routes End

		//Media Related Controller
		Route::get('/media', 'MediaController@index');
		//Media Related Controller End
	});

});
//All Backend routes End
