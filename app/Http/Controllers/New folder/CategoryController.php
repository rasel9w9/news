<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
	public function __construct(){
		//$this->middleware('auth');
		$this->middleware('login_check');
	}
    public function index(){
		return view('admin.category.add_category');
	}
	
	public function all_categories(){
		$categories=DB::table('tbl_category')->get();
		return view('admin.category.all_categories')->with('allcategories',$categories);
		//return $categories;
		//return view('admin.all_category',compact('categories'));
	}
	
	public function save_category(Request $request){
		$validate=$request->validate([
			'category_name'=>['string','required'],
			'category_description'=>['string','required'],
			'publication_status'=>['boolean']
		]);
		//This if condition for solving cannot be null 'publication_status' column solution...
		if($request->publication_status!=1){
			$request->publication_status=0;
		}
		$data=[
			'category_name'=>$request->category_name,
			'category_description'=>$request->category_description,
			'publication_status'=>$request->publication_status
		];
		$insert=DB::table('tbl_category')->insert($data);
		if($insert){
			session()->flash('cat_msg',"Category Added Succesfully..");
			return redirect()->back();
		}
	}
	
	public function publication_cat($id,$status){
		$update=DB::table('tbl_category')->where('category_id',$id)
				->update([
					'publication_status'=>$status
				]);
		if($update){
			if($status==1){
				session()->flash('publication_msg',"Category Activate Succesfully..");
			}else{
				session()->flash('publication_msg',"Category Inactive Succesfully..");
			}
		}else{session()->flash('publication_msg',"Sorry!Category Operation Failed");}
			//print_r($update);
		return redirect()->back();
	}
	
	public function delete_category($id){
		$update=DB::table('tbl_category')->where('category_id',$id)
				->delete();
		return redirect()->back();
	}
	public function edit_category($id){
		$category=DB::table('tbl_category')->where('category_id',$id)->first();
		if($category){
		return view('admin.category.edit_category',compact('category'));
		}else{echo "There is an error.Please try again";}
	}
	
	public function update_category(Request $request,$id){
		$validate=$request->validate([
			'category_name'=>['string','required'],
			'category_description'=>['string','required']
		]);
		$data=[
			'category_name'=>$request->category_name,
			'category_description'=>$request->category_description
		];
		$update=DB::table('tbl_category')->where('category_id',$id)->update($data);
		if($update){
			session()->flash('edit_cat_msg',"Category Updated Succesfully..");
			return redirect('/all_category');
		}else{echo "<h4>There is an error to update!</h4>";}
	}
}
