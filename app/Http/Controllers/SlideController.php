<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class SlideController extends Controller
{
	public function __construct(){
		$this->middleware('login_check');
	}
     public function index(){
		return view('admin/slide/add_slide');
	}
	
	public function all_slides(){
		$slides=DB::table('tbl_slides')->get();
		return view('admin.slide.all_slides')->with('allslides',$slides);
	}
	
	public function save_slide(Request $request){
		$validate=$request->validate([
			'slide_heading'=>['required','string',"max:60"],
			'slide_description'=>['required','string'],
			'slide_image'=>['required',"mimes:['jpg,jpeg,png']"],
		]);
		if($request->publication_status!=1){
			$request->publication_status=0;
		}
		//This if condition for solving cannot be null 'publication_status' column solution...
		$data=[
			'slide_heading'=>$request->slide_heading,
			'slide_text'=>$request->slide_description,
			'slide_image'=>$request->file('slide_image')->store('public/slides_image/'),
			'publication_status'=>$request->publication_status
		];
		//return $data;
		$insert=DB::table('tbl_slides')->insert($data);
		if($insert){
			session()->flash('slide_msg',"Slide Added Succesfully..");
			return redirect()->back();
		} else{
			session()->flash('slide_msg',"Slide Not Added!!!");
			return redirect()->back();
		}
	}
	
	public function publication($id,$status){
		$update=DB::table('tbl_slides')->where('slide_id',$id)
				->update([
					'publication_status'=>$status
				]);
		if($update){
			if($status==1){
				session()->flash('publication_msg',"Slide Activate Succesfully..");
			}else{
				session()->flash('publication_msg',"Slides Inactive Succesfully..");
			}
		}else{session()->flash('publication_msg',"Sorry!Slide Operation Failed");}
			//print_r($update);
		return redirect()->back();
	}
	
	public function delete_slide($id){
		$delete=DB::table('tbl_slides')->where('slide_id',$id)
				->delete();
		if($delete){
			session()->flash('slide_msg',"Slide Deleted Succesfully..");
			return redirect()->back();
		} else{
			session()->flash('slide_msg',"Slide Not Deleted!!!");
			return redirect()->back();
		}
	}
	public function edit_slide($id){
		$slide=DB::table('tbl_slides')->where('slide_id',$id)->first();
		if($slide){
		return view('admin.slide.edit_slide',compact('slide'));
		}else{echo "There is an error.Please try again";}
	}
	
	public function update_slide(Request $request,$id){
		$validate=$request->validate([
			'slide_heading'=>['required','string',"max:60"],
			'slide_description'=>['required','string'],
			'slide_image'=>["mimes:['jpg,jpeg,png']"]
		]);
		$data=[
			'slide_heading'=>$request->slide_heading,
			'slide_text'=>$request->slide_description
		];
		
		if($request->file('slide_image')){
			$data['slide_image']=$request->file('slide_image')->store('public/slides_image/');
		}
		//return $data;
		$update=DB::table('tbl_slides')->where('slide_id',$id)->update($data);
		if($update){
			session()->flash('slide_msg',"Slide Update Succesfully..");
			return redirect()->back();
		} else{
			session()->flash('slide_msg',"Slide Not Updated!!!");
			return redirect()->back();
		}
		
	}
}
