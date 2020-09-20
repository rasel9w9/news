<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Event\CustomerOrder;
use DB;

class OrderController extends Controller
{
	public function __construct(){
		$this->middleware('login_check');
	}
	public function waitting_orders(){
	  $p_orders=DB::table('tbl_order')
				->where('order_status',0)
				->get();
	  return view('admin.order.waitting_orders')->with('p_orders',$p_orders);
	}
	public function sent_orders(){
	  $sent_orders=DB::table('tbl_order')
				->where('order_status',1)
				->get();
	  return view('admin.order.sent_orders')->with('sent_orders',$sent_orders);
	}
	public function backed_orders(){
	  $backed_orders=DB::table('tbl_order')
				->where('order_status',2)
				->get();
	  return view('admin.order.backed_orders')->with('backed_orders',$backed_orders);
	}
	public function view_order($order_id){
	   $orders=DB::table('tbl_order')->where('tbl_order.order_id',$order_id)
				->join('tbl_order_details','tbl_order.order_id','tbl_order_details.order_id')
				->join('tbl_shipping','tbl_order.order_id','tbl_shipping.order_id')
				->get();
				//echo "<pre>";print_r($orders);return 1;
	   return view('admin.order.view_order',compact('orders'));
	}
	public function delete_order($order_id){
	   $delete_order=DB::table('tbl_order')->where('order_id',$order_id)
					->delete();
		if($delete_order){
			session()->flash('delete_order','Order Deleted Permanently');
			session()->flash('cls','alert-success');
			return redirect('backed_orders');
		}else{
			session()->flash('delete_order','Order Not Deleted');
			session()->flash('cls','alert-danger');
			return redirect('backed_orders');
		}
	}
   
	public function sendemail(){
	event(new CustomerOrder('Rasel9w9@gmail.com'));
	}
   
    public function send_order($order_id){
	   $sending=DB::table('tbl_order')->where('order_id',$order_id)
				->update(['order_status'=>1]);
		if($sending){
			echo "<h2>Order Sent</h2>";
		}
    }
	public function back_order1($order_id){
	    $order_back=DB::table('tbl_order')->where('order_id',$order_id)
				->delete();
		$query="UPDATE tbl_products SET product_stock=(SELECT product_stock from tbl_products WHERE product_id=4)+4 WHERE product_id=4"; 
    }
	public function back_order(Request $request ){
		//the method is called by ajax request...
		$order_id=$request->order_id;
		$products_id=$request->products_id;
		$products_qty=$request->products_qty;
		$id_stock=array_combine($products_id,$products_qty);
		try{
			DB::beginTransaction();
			foreach($id_stock as $id=>$qty){
				$query="UPDATE tbl_products set product_stock=(SELECT product_stock FROM tbl_products WHERE product_id=$id)+$qty WHERE product_id=$id ";
				DB::statement($query);
			}
			$order_update=DB::table('tbl_order')
						  ->where('order_id',$order_id)
						  ->update(['order_status'=>2]);
			if($order_update){
				DB::commit();
				session()->flash('cls','alert-success');
				session()->flash('back-order','Product backed Succesfully and stock updated');
			}
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('cls','alert-danger');
			session()->flash('back-order','Product backed failed!!');
		} 
    }
}

