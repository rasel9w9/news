<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
class CategoryController extends Controller
{
	public function __construct(){
		//$this->middleware('auth');
		//$this->middleware('logincheck');
	}
    public function index(){
		$allCategories=Category::all();
		//return $allCategories;
		return view('admin.category.add_category',compact('allCategories'));
	}
	
	public function all_categories(){
		$categories=DB::table('category_table')->get();
		return view('admin.category.all_categories')->with('allcategories',$categories);
		//return $categories;
		//return view('admin.all_category',compact('categories'));
	}
	
	public function save_category(Request $request){
		$validate=$request->validate([
			'category_name'=>['string','required'],
			'category_status'=>['boolean']
		]);
		//This if condition for solving cannot be null 'publication_status' column solution...
		$data=[
			'category_name'=>$request->category_name,
			'category_type'=>$request->category_type,
			'category_description'=>$request->category_description,
			'category_status'=>$request->category_status
		];
		if(!$data['category_status']){
			$data['category_status']=0;
		}
		//return $data;
		//$input=$request->all();
		$insert=DB::table('category_table')->insert($data);
		if($insert){
			session()->flash('class',"alert alert-success");
			session()->flash('cat_msg',"Category Added Succesfully..");
			return redirect()->back();
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('cat_msg',"Sorry! Category Not Added..");
			return redirect()->back();
		}
	}
	
	public function publication($id,$status){
		$update=DB::table('category_table')->where('category_id',$id)
				->update([
					'category_status'=>$status
				]);
		if($update){
			if($status==1){
				session()->flash('class',"alert alert-success");
				session()->flash('cat_msg',"Category Activate Succesfully..");
			}else{
				session()->flash('class',"alert alert-success");
				session()->flash('cat_msg',"Category Inactive Succesfully..");
			}
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('publication_msg',"Sorry!Category Operation Failed");
		}
		//print_r($update);
		return redirect()->back();
	}
	
	public function delete_category($id){
		$delete=DB::table('category_table')->where('category_id',$id)
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
	public function edit_category($id){
		$category=DB::table('category_table')->where('category_id',$id)->first();
		if($category){
		return view('admin.category.edit_category',compact('category'));
		}else{echo "There is an error.Please try again";}
	}
	
	public function update_category(Request $request,$id){
		$validate=$request->validate([
			'category_name'=>['string','required'],
			'category_status'=>['boolean']
		]);
		$data=[
			'category_name'=>$request->category_name,
			'category_type'=>$request->category_type,
			'category_description'=>$request->category_description,
			'category_status'=>$request->category_status
		];
		if(!$data['category_status']){
			$data['category_status']=0;
		}
		$update=DB::table('category_table')->where('category_id',$id)->update($data);
		if($update){
			session()->flash('class',"alert alert-success");
			session()->flash('cat_msg',"Category Updated Succesfully..");
			return redirect()->route('category');
		}else{echo "<h4>There is an error to update!</h4>";}
	}
}
