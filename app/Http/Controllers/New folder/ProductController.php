<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
	public function __construct(){
		$this->middleware('login_check');
	}
    public function index(){
		return view('admin/product/add_product');
	}
	
	public function all_products(){
		$products=DB::table('tbl_products')
				->join('tbl_category','tbl_products.cat_id','tbl_category.category_id')
				->join('tbl_manufacture','tbl_products.manufac_id','tbl_manufacture.manufacture_id')
				->get();
		return view('admin.product.all_products')->with('allproducts',$products);
	}
	
	public function save_product(Request $request){
		$validate=$request->validate([
			'product_name'=>['required','string'],
			'product_stock'=>['required','integer'],
			'cat_id'=>['required','integer'],
			'manufac_id'=>['required','integer'],
			'product_description'=>['string'],
			'product_price'=>['required','numeric'],
			'product_image'=>['required',"mimes:['jpg,jpeg,png']"],
			'product_size'=>['required'],
			'product_color'=>['required']
		]);
		//This if condition for solving cannot be null 'publication_status' column solution...
		if($request->publication_status!=1){
			$request->publication_status=0;
		}
		$data=[
			'product_name'=>$request->product_name,
			'product_stock'=>$request->product_stock,
			'cat_id'=>$request->cat_id,
			'manufac_id'=>$request->manufac_id,
			'product_description'=>$request->product_description,
			'product_price'=>$request->product_price,
			'product_image'=>$request->file('product_image')->store('public/products_image/'),
			'product_size'=>implode('-',$request->get('product_size')),
			'product_color'=>implode('-',$request->get('product_color')),
			'pub_status'=>$request->publication_status
		];
		//echo "<pre>";print_r($data);die();
		$insert=DB::table('tbl_products')->insert($data);
		if($insert){
			session()->flash('product_msg',"Product Added Succesfully..");
			return redirect()->back();
		} else{
			session()->flash('product_msg',"Product Not Added!!!");
			return redirect()->back();
		}
	}
	
	public function publication($id,$status){
		$update=DB::table('tbl_products')->where('product_id',$id)
				->update([
					'pub_status'=>$status
				]);
		if($update){
			if($status==1){
				session()->flash('publication_msg',"Product Activate Succesfully..");
			}else{
				session()->flash('publication_msg',"Product Inactive Succesfully..");
			}
		}else{session()->flash('publication_msg',"Sorry!Product Operation Failed");}
			//print_r($update);
		return redirect()->back();
	}
	
	public function delete_product($id){
		$delete=DB::table('tbl_products')->where('product_id',$id)
				->delete();
		if($delete){
			session()->flash('product_msg',"Product Deleted Succesfully..");
			return redirect()->back();
		} else{
			session()->flash('product_msg',"Product Not Deleted!!!");
			return redirect()->back();
		}
	}
	public function edit_product($id){
		$product=DB::table('tbl_products')->where('product_id',$id)->first();
		if($product){
		return view('admin.product.edit_product',compact('product'));
		}else{echo "There is an error.Please try again";}
	}
	
	public function update_product(Request $request,$id){
		 $validate=$request->validate([
			'product_name'=>['required','string'],
			'product_stock'=>['required','integer'],
			'cat_id'=>['required','integer'],
			'manufac_id'=>['required','integer'],
			'product_description'=>['string'],
			'product_price'=>['required','numeric'],
			'product_image'=>["mimes:['jpg,jpeg,png']"],
			'product_size'=>['required'],
			'product_color'=>['required']
		]); 
		if($request->publication_status!=1){
			$request->publication_status=0;
		}
		$data=[
			'product_name'=>$request->product_name,
			'product_stock'=>$request->product_stock,
			'cat_id'=>$request->cat_id,
			'manufac_id'=>$request->manufac_id,
			'product_description'=>$request->product_description,
			'product_price'=>$request->product_price,
			'product_size'=>implode('-',$request->get('product_size')),
			'product_color'=>implode('-',$request->get('product_color')),
			'pub_status'=>$request->publication_status
		];
		if($request->file('product_image')){
			$data['product_image']=$request->file('product_image')->store('public/products_image/');
		}
		//return $data;
		$update=DB::table('tbl_products')->where('product_id',$id)->update($data);
		if($update){
			session()->flash('product_msg',"Product Update Succesfully..");
			return redirect()->back();
		} else{
			session()->flash('product_msg',"Product Not Updated!!!");
			return redirect()->back();
		}
		
	}
	
}
