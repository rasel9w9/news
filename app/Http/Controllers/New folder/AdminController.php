<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
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
	public function dashboard(Request $request){
		$admin_email=$request->admin_email;
		$admin_password=md5($request->admin_password);
		$result=DB::table('tbl_admin')
				->where('admin_email',$admin_email)
				->where('admin_password',$admin_password)
				->first();
		if($result){
			//Session::put('admin_name',$result->admin_name);
			//Session::put('admin_id',$result->admin_id);
			session([
				'login'=>true,
				'admin_name'=>$result->admin_name,
				'admin_id'=>$result->admin_id
			]);
			return Redirect::to('show_dashboard');//using Redirect facades
		}else{
			session()->flash('msg',"User name or password wrong");
			return redirect()->back();//using redirecct helper
		}
	}
	public function logout(){
		session()->flush();
		return redirect('login');
	}
}
