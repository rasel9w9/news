<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
		$products=DB::table('tbl_products')
				->WHERE('product_stock','<>',0)
				->WHERE('pub_status',1)
				->join('tbl_category','tbl_products.cat_id','tbl_category.category_id')
				->join('tbl_manufacture','tbl_products.manufac_id','tbl_manufacture.manufacture_id')
				->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name',)
				->orderBy('tbl_products.product_id','desc')
				->paginate(5);
        return view('pages.home',compact('products'));
    }
	public function products_by_category($cat_id){
		$products=DB::table('tbl_products')->where('cat_id',$cat_id)
				->join('tbl_category','tbl_products.cat_id','tbl_category.category_id')
				->select('tbl_products.*','tbl_category.category_name')
				->get();
			//return $products;
		 return view('pages.products_by_category',compact('products'));
	}
	public function products_by_manufacture($manufac_id){
		$products=DB::table('tbl_products')->where('manufac_id',$manufac_id)
				->join('tbl_manufacture','tbl_products.manufac_id','tbl_manufacture.manufacture_id')
				->select('tbl_products.*','tbl_manufacture.manufacture_name')
				->get();
		 return view('pages.products_by_manufac',compact('products'));
	}
	public function product_by_id($product_id){
		$product=DB::table('tbl_products')
				->where('product_id',$product_id)
				->join('tbl_category','tbl_products.cat_id','tbl_category.category_id')
				->join('tbl_manufacture','tbl_products.manufac_id','tbl_manufacture.manufacture_id')
				->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name',)
				->first();
		$recommendkey=strtok($product->product_name," ");
		$recommendItems=DB::table('tbl_products')
						->where('product_name','LIKE',"%$recommendkey%")
						->get();
		return view('pages.product_by_id',compact('product','recommendItems'));
	}
	
	public function search($searchkey){
		$searchProducts=DB::table('tbl_products')
						->where('product_name','LIKE',"%$searchkey%")
						->get();
		return view('pages.products_by_search',compact('searchProducts'));
	}
	public function price_range($price1,$price2){
		$priceRangedProducts=DB::table('tbl_products')
						->whereBetween('product_price',[$price1,$price2])
						->get();
		//return $priceRangedProducts;
		return view('pages.products_by_price',compact('priceRangedProducts'));
	}
}
