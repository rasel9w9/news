<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
Use Cart;
class CuponController extends Controller
{
	 public function index(){
		return view('admin/cupon/create_cupon');
	}
    public function create_cupon(Request $request){
		//echo "<pre>";print_r($request->toArray());return 1;
		$validate=$request->validate([
			'cupon_code'=>['required','string'],
			'start_date'=>['required','date'],
			'end_date'=>['required','date'],
			'cupon_times'=>['integer'],
			'discount'=>['required','numeric']
		]); 
		$cupon['cupon_code']=$request->cupon_code;
		$cupon['start_date']=$request->start_date;
		$cupon['end_date']=$request->end_date;
		$cupon['cupon_times']=$request->cupon_times;
		$cupon['discount']=$request->discount;
		//return $cupon;
		$insert_cupon=DB::table('tbl_cupon')->insertGetId($cupon);
		echo $insert_cupon;
	}
	public function all_cupons(){
		$allcupons=DB::table('tbl_cupon')->get();
		return view('admin.cupon.all_cupons')->with('allcupons',$allcupons);
	}
	
	public function edit_cupon($id){
		$cupon=DB::table('tbl_cupon')->where('cupon_id',$id)->first();
		if($cupon){
		return view('admin.cupon.edit_cupon',compact('cupon'));
		}else{echo "There is an error.Please try again";}
	}
	
	public function update_cupon(Request $request,$id){
		$validate=$request->validate([
			'cupon_code'=>['required','string'],
			'start_date'=>['required','date'],
			'end_date'=>['required','date'],
			'cupon_times'=>['integer'],
			'discount'=>['required','numeric']
		]); 
		$cupon['cupon_code']=$request->cupon_code;
		$cupon['start_date']=$request->start_date;
		$cupon['end_date']=$request->end_date;
		$cupon['cupon_times']=$request->cupon_times;
		$cupon['discount']=$request->discount;
		$update=DB::table('tbl_cupon')->where('cupon_id',$id)->update($cupon);
		if($update){
			session()->flash('edit_cupon_msg',"Cupon Updated Succesfully..");
			return redirect('/all_cupons');
		}else{echo "<h4>There is an error to update!</h4>";}
	}
	
	public function apply_cupon($cupon_code){
		if(session('cupon_applied')==true){
			session()->flash('cupon_msg','Sorry! Cupon Already Applied');
			session()->flash('cupon_cls','alert-warning');
			return redirect('show_cart');
		}
		$cupon=DB::table('tbl_cupon')->where('cupon_code',$cupon_code)
				->first();
		if($cupon){
			$cuponExpiration=$cupon->end_date;
			if(strtotime($cuponExpiration)<time()){
				session()->flash('cupon_msg',"Sorry! Cupon Expired on $cuponExpiration");
				session()->flash('cupon_cls','alert-danger');
				return redirect('show_cart'); 
			};
			$cuponsetting=[
				'name' => $cupon->cupon_code,
				'type' => 'offer',
				'target' => 'total',
				'value' =>"-".$cupon->discount."%",
				'order'=>1
			];
			$cupon_apply = new \Darryldecode\Cart\CartCondition($cuponsetting);
			Cart::condition($cupon_apply);
			session(['cupon_applied'=>true]);
			session()->flash('cupon_msg','Cupon Applied Succesfully');
			session()->flash('cupon_cls','alert-success');
			return redirect('show_cart');
			//return $cuponsetting;
		}else{
			session()->flash('cupon_msg','You Entered an Invalid Cupon');
			session()->flash('cupon_cls','alert-danger');
			return redirect('show_cart');
		}
	}
}
