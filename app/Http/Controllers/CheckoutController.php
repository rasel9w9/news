<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Event\CustomerOrder;
use DB;
use Cart;

class CheckoutController extends Controller
{
    public function index(){
		if(Cart::isEmpty()){
			Echo "<h2>There are no Items In The cart</h2>";
			exit();
		}
		return view('pages.checkout');
	}
	public function shipping(Request $request){
		$validate=$request->validate([
			'first_name'=>['string','required','max:20'],
			'last_name'=>['string','required','max:20'],
			'email'=>['required','string'],
			'phone'=>['required','numeric'],
			'city'=>['required','string'],
			'address'=>['required','string'],
			'payment_gateway'=>['required']
		]);
		$shipping['first_name']=$request->first_name;
		$shipping['last_name']=$request->last_name;
		$shipping['email']=$request->email;
		$shipping['phone']=$request->phone;
		$shipping['city']=$request->city;
		$shipping['address']=$request->address;
		$payment=[
			'payment_method'=>$request->payment_gateway,
			'payment_status'=>0
		];
		//return $shipping;
		$items=Cart::getContent();
		$remain_stock_query="UPDATE tbl_products SET product_stock= CASE product_id ";
		//return $items;
		try{
			DB::beginTransaction();
			$payment_id=1;//DB::table('tbl_payment')->insertGetId($payment);
			if($payment_id){
				$order['payment_id']=$payment_id;
				$order['onlySubtotal']=session('onlySubTotal');//without tax
				$order['tax']=session('tax');
				$order['shipping']=session('shipping',0);
				$order['order_total']=session('subTotal');//with tax
				$order['discount']=session('discount',0);
				$order['payable']=session('payable');
				$order['payment_id']=$payment_id;
				//return $order;
				$order_id=DB::table('tbl_order')->insertGetId($order);
				//return $order_id;
				if($order_id){
					foreach($items as $item){
					$order_detail['order_id']=$order_id;
					$order_detail['product_id']=$item->id;
					$order_detail['product_name']=$item->name;
					$order_detail['product_price']=$item->price;
					$order_detail['product_quantity']=$item->quantity;
					$order_detail['total_price']=$item->price*$item->quantity;
					$products_id[]=$item->id;//For updating product stock;
					$remain_stock=$item->attributes->stock-$item->quantity;//For updating product stock;
					$remain_stock_query.="WHEN $item->id THEN $remain_stock ";//For updating product stock;
					$order_details[]=$order_detail;
					}
					$products_id=implode($products_id,',');
					$remain_stock_query.="END WHERE product_id IN($products_id)";
					$insert_order_details=DB::table('tbl_order_details')->insert($order_details);
					if($insert_order_details){
						$shipping['order_id']=$order_id;
						$insert_shipping=DB::table('tbl_shipping')->insertGetId($shipping);
						if($insert_shipping){
							$stock_update=DB::statement($remain_stock_query);
							if($stock_update){
								Cart::clearCartConditions();
								Cart::clear();
								session()->forget(['onlySubtotal','subTotal','tax','shipping','discount','payable','cupon_applied']);
								DB::commit();
								event(new CustomerOrder($shipping['email']));
								echo "<h2>Order Placed succesfull.Check your given email</h2>";
							}
						}
					}
				}
			}
		 }catch(\Exception $e){
			DB::rollback();
			echo $e->getMessage();
			echo "<br>";
			echo "There Is a Problem to Order.Please try Again";
		} 
	}
}
