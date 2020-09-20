<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\facades\Blade;
use Illuminate\Support\facades\View;
use DB;
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
		//$roll_id=session()->all();
		//print_r($roll_id);exit();
		//$rolls=explode(',',DB::table('user_type')->where('id',$roll_id)->first()->rolls);
        //View::share('rolls',$rolls);
		view()->composer('*',function($view){
			if(session()->has('admin_roll')){
				$roll_id=session('admin_roll');
				$rolls=DB::table('user_type')->where('id',$roll_id)->first()->rolls;
				$rolls=explode(',',$rolls);
				$meta=DB::table('meta_table')->first();
				$view->with(['rolls'=>$rolls,'meta'=>$meta]);
			}
		});
    }
}
