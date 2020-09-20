<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Reporter;
class ReporterController extends Controller
{
	public function __construct(){
		//$this->middleware('auth');
		//$this->middleware('login_check');
	}
    public function index(){
		$allReporters=Reporter::all();
		//return $allCategories;
		return view('admin.reporter.reporter',compact('allReporters'));
	}
	
	public function all_reporters(){
		$categories=DB::table('reporter_table')->get();
		return view('admin.reporter.all_categories')->with('allcategories',$categories);
		//return $categories;
		//return view('admin.all_reporter',compact('categories'));
	}
	
	public function save_reporter(Request $request){
		$validate=$request->validate([
			'reporter_name'=>['string','required'],
			'reporter_email'=>['email','required','unique:reporter_table'],
			'reporter_mobile'=>['numeric','required'],
			'reporter_address'=>['string','required']
		]);
		$data=$request->all();
		if($reporterImage=$request->file('reporter_image')){
			$request->validate([
				'reporter_image'=>['required',"mimes:['jpg,jpeg,png']"]
			]);
			$path="uploads/reporter_image/";
			$data['reporter_image']=$reporterImage->store($path);
		}else{
			$data['reporter_image']='uploads/default_image.jpg';
		}
		$data['created_by']="DEveloper Alaudddin";
		$reporter=new Reporter;
		//$insert=DB::table('reporter_table')->insert($data);
		if($reporter->fill($data)->save()){
			session()->flash('class',"alert alert-success");
			session()->flash('reporter_msg',"Reporter Added Succesfully..");
			return redirect()->back();
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('reporter_msg',"Sorry! Reporter Not Added..");
			return redirect()->back();
		}
	}
	
	public function publication($id,$status){
		$update=DB::table('reporter_table')->where('reporter_id',$id)
				->update([
					'reporter_status'=>$status
				]);
		if($update){
			if($status==1){
				session()->flash('class',"alert alert-success");
				session()->flash('reporter_msg',"Reporter Activate Succesfully..");
			}else{
				session()->flash('class',"alert alert-success");
				session()->flash('reporter_msg',"Reporter Deactivate Succesfully..");
			}
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('publication_msg',"Sorry!Reporter Operation Failed");
		}
		//print_r($update);
		return redirect()->back();
	}
	
	public function delete_reporter($id){
		$delete=DB::table('reporter_table')->where('reporter_id',$id)
				->delete();
		if($delete){
			session()->flash('class',"alert alert-success");
			session()->flash('cat_msg',"Category Deleted Succesfully..");
		}else{
			session()->flash('class',"alert alert-warning");
			session()->flash('cat_msg',"Sorry!Category Not deleted.");
		}
		return redirect()->back();
	}
	public function edit_reporter($id){
		$reporter=DB::table('reporter_table')->where('reporter_id',$id)->first();
		if($reporter){
		return view('admin.reporter.edit_reporter',compact('reporter'));
		}else{echo "There is an error.Please try again";}
	}
	
	public function update_reporter(Request $request,$id){
		//echo "founded";exit();
		 $validate=$request->validate([
			'reporter_name'=>['string','required'],
			'reporter_email'=>['email','required'],
			'reporter_mobile'=>['numeric','required'],
			'reporter_address'=>['string','required']
		]);
		if($request->oldemail!=$request->reporter_email){
			$request->validate([
				'reporter_email'=>['email','required','unique:reporter_table']
			]);
		}
		$data=$request->all();
		if($reporterImage=$request->file('reporter_image')){
			$request->validate([
				'reporter_image'=>['required',"mimes:['jpg,jpeg,png']"]
			]);
			$path="uploads/reporter_image/";
			$data['reporter_image']=$reporterImage->store($path);
			if($request->oldimage!='uploads/default_image.jpg'){
				@unlink("storage/app/".$request->oldimage);
			}
		}else{
			$data['reporter_image']=$request->oldimage;
		}
		//dd($data);
		$reporter=Reporter::find($id);
		//$insert=DB::table('reporter_table')->insert($data);
		if($reporter->update($data)){
			session()->flash('class',"alert alert-success");
			session()->flash('reporter_msg',"Reporter Updated Succesfully..");
			return redirect('admin/reporter');
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('reporter_msg',"Sorry! Reporter Not Updated..");
			return redirect('admin/reporter');
		}
	}
}
