<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin as user;
class UserController extends Controller
{
	public function __construct(){
		//$this->middleware('auth');
		//$this->middleware('logincheck');
	}
    public function index(){
		$allUsers=User::all();
		//return $allUsers;
		return view('admin.user.user',compact('allUsers'));
	}
	
	public function all_users(){
		$categories=DB::table('user_table')->get();
		return view('admin.user.all_users')->with('allusers',$users);
		//return $categories;
		//return view('admin.all_user',compact('categories'));
	}
	
	public function save_user(Request $request){
		$validate=$request->validate([
			'user_name'=>['string','required'],
			'user_status'=>['boolean'],
			'user_email'=>['email'],
			'user_role'=>['numeric'],
			'user_mobile'=>['numeric'],
			'user_image'=>['required',"mimes:['jpg,jpeg,png']"]
		]);
		$data=$request->all();
		$data['user_password']=md5('a_good_password');
		$data['created_by']=session('admin_name');
		if($userImage=$request->file('user_image')){
			/* $request->validate([
				'post_image'=>['required',"mimes:['jpg,jpeg,png']"]
			]); */
			$path="uploads/user_image/";
			$data['user_image']=$userImage->store($path);
		}else{
			$data['user_image']='uploads/user_default_image.jpg';
		}
		$user=new user;
		if($user->fill($data)->save()){
			session()->flash('class',"alert alert-success");
			session()->flash('user_msg',"User Added Succesfully..");
			return redirect()->back();
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('user_msg',"Sorry! User Not Added..");
			return redirect()->back();
		}
	}
	
	public function publication($id,$status){
		$update=DB::table('user_table')->where('user_id',$id)
				->update([
					'user_status'=>$status
				]);
		if($update){
			if($status==1){
				session()->flash('class',"alert alert-success");
				session()->flash('user_msg',"User Activate Succesfully..");
			}else{
				session()->flash('class',"alert alert-success");
				session()->flash('user_msg',"User Inactive Succesfully..");
			}
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('user_msg',"Sorry!User Operation Failed");
		}
		//print_r($update);
		return redirect()->back();
	}
	
	public function delete_user($id){
		$delete=DB::table('user_table')->where('user_id',$id)
				->delete();
		if($delete){
			session()->flash('class',"alert alert-success");
			session()->flash('user_msg',"User Deleted Succesfully..");
		}else{
			session()->flash('class',"alert alert-warning");
			session()->flash('user_msg',"Sorry!User Not deleted.");
		}
		return redirect()->back();
	}
	
	//For edit user,Super Admin can edit every user But a user can only edit himself by only clicking profile button,when click the $id get user_id from session otherwise super admin can edit.
	public function edit_user($id=false){
		if(!$id){$id=session('admin_id');}
		$user=DB::table('user_table')->where('user_id',$id)->first();
		if($user){
		return view('admin.user.edit_user',compact('user'));
		}else{echo "There is an error.Please try again";}
	}
	
	
	public function update_user(Request $request,$id){
		$validate=$request->validate([
			'user_name'=>['string','required'],
			'user_status'=>['boolean'],
			'user_email'=>['email'],
			'user_role'=>['numeric'],
			'user_mobile'=>['numeric'],
		]);
		$data=$request->all();
		$data['user_password']=md5('a_good_password');
		$data['updated_by']=session('admin_name');
		if($userImage=$request->file('user_image')){
			$oldImage=$request->old_image;
			$validate=$request->validate([
				'user_image'=>['required',"mimes:['jpg,jpeg,png']"]
			]);
			$path="uploads/user_image/";
			$data['user_image']=$userImage->store($path);
			if($oldImage!='uploads/user_default_image.jpg'){
				@unlink("storage/app/".$oldImage);
			}
		}
		$user=User::find($id);
		if($user->update($data)){
			session()->flash('class',"alert alert-success");
			session()->flash('user_msg',"User Updated Succesfully..");
			return redirect('admin/user');
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('user_msg',"Sorry! User Not Updated..");
			return redirect('admin/user');
		}
	}
}
