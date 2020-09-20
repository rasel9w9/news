<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{
	public function __construct(){
		//$this->middleware('auth');
		//$this->middleware('login_check');
	}
    public function index(){
		return view('admin_login');
	}
	public function show_dashboard(){
		//$this->middleware('login_check');
		return view('admin.dashboard');
	}
	public function alladmins(){
		$allAdmins=Admin::all();
		return view('admin.user.user',compact('allAdmins'));
	}
	
	public function login_check(Request $request){
		$admin_email=$request->admin_email;
		$admin_password=md5($request->admin_password);
		$result=DB::table('user_table')
				->where('user_email',$admin_email)
				->where('user_password',$admin_password)
				->first();
		if($result){
			//$roles=DB::table('user_type')->where('id',$result->user_role)->first();
			session([
				'login'=>true,
				'admin_name'=>$result->user_name,
				'admin_id'=>$result->user_id,
				'admin_roll'=>$result->user_role
			]);
			//echo "<pre>";print_r(session('admin_roll'));exit();
			return Redirect::to('admin/show_dashboard');//using Redirect facades
		}else{
			session()->flash('msg',"User name or password wrong");
			return redirect()->back();//using redirecct helper
		}
	}
	public function logout(){
		session()->flush();
		return redirect('admin/login');
	}
}
