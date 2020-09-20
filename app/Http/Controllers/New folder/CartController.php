<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Cart;

class CartController extends Controller
{
   public function index(){
	   return view('pages.add_to_cart');
   }
   public function add_to_cart(Request $request){
	   $validate=$request->validate([
			'quantity'=>['required','integer']
	   ]);
	   $quantity=$request->quantity;
	   $id=$request->product_id ;//coming from hidden input box..
	   $product=DB::table('tbl_products')->where('product_id',$id)
				->first();
		$stock=$product->product_stock;
		if(Cart::get($id)){
			$pre_qty=Cart::get($id)->quantity;
			if(($quantity+$pre_qty)>$stock){
				session()->flash('cart_msg',"Sorry quantity not be greater than stock and you have alredy added $pre_qty this product");
				session()->flash('cart_cls','alert-danger');
				return redirect()->back();
			}
		}else{
			if($quantity>$stock){
			session()->flash('cart_msg','Sorry quantity not be greater than stock');
			session()->flash('cart_cls','alert-danger');
			return redirect()->back();
			}
		}
		$data['id']=$product->product_id;
		$data['name']=$product->product_name;
		$data['price']=$product->product_price;
		$data['quantity']=$quantity;
		$data['attributes']['image']=$product->product_image;
		$data['attributes']['stock']=$product->product_stock;
		Cart::add($data);
		return redirect('show_cart');
   }
	public function show_cart(){
		//echo "<pre>";print_r(Cart::getContent());exit();
		if(Cart::isEmpty()){
			Echo "<h2>There are no Items In The cart</h2>";
			exit();
		}
		$items=Cart::getContent();
		$bill['onlySubTotal']=Cart::getSubTotalWithoutConditions();//without applied tax & Shipping;
		$bill['tax']=ceil($this->tax($bill['onlySubTotal']));//Calculating The tax by below the tax method
		$bill['shipping']=$this->shipping_cost();//Adding The shipping cost by below the shipping_cost method
		$bill['subTotal']=ceil(Cart::getSubtotal());//With Applied Tax & Shipping Cost,
		$bill['payable']=ceil(Cart::getTotal());//getting total Afetr Calculating the tax,shipping discount etc..
		$bill['discount']=$bill['subTotal']-$bill['payable'];//calculating manually the Discount value
		session($bill);//For sending databse from different Controller
		return view('pages.add_to_cart',['bill'=>$bill,'items'=>$items]);
	}
	public function shipping_cost($value=50){
		$shippingCost = new \Darryldecode\Cart\CartCondition(array(
			'name' => 'shipping',
			'type' => 'shipping',
			'target' => 'subtotal', 
			'value' => $value,
			'order' => 1
		));
		Cart::condition($shippingCost);
		$shipping_cost = Cart::getCondition('shipping');
		return $shipping_cost->getValue();
	}

	public function tax($subTotal,$value='1%'){
		$tax_rules = new \Darryldecode\Cart\CartCondition(array(
			'name' => 'tax',
			'type' => 'tax',
			'target' => 'subtotal', 
			'value' => "$value",
			'order' => 1
		));
		Cart::condition($tax_rules);
		$tax = Cart::getCondition('tax');
		return $tax->getCalculatedValue($subTotal);
	} 
	
	public function clear_cart(){
		Cart::clearCartConditions();
		Cart::clear();
		echo "Cart Cleared";
	}
	public function remove_cart($id){
		$remove=Cart::remove($id);
		if($remove){
			session()->flash('cart_msg','Product Removed Succesfully');
			session()->flash('cart_cls','alert-success');
			return redirect()->back();
		}
		if(Cart::getTotalQuantity()==0){
			Cart::clearCartConditions();
			Cart::clear();
			return redirect()->back();
		}
	}
	public function update_cart(Request $request,$id){
		$validate=$request->validate([
			'quantity'=>['required','integer']
		]);
		$qty=$request->quantity;
		$stock=Cart::get($id)->attributes->stock;
		if($qty>$stock){
			session()->flash('cart_msg','Sorry quantity not be greater than stock');
			session()->flash('cart_cls','alert-danger');
			return redirect()->back();
		}
		Cart::update($id, array(
			'quantity'=>array(
				'relative'=>false,
				'value' =>$qty
			)
		));
		session()->flash('cart_msg','Updated Succesfully');
		session()->flash('cart_cls','alert-success');
		return redirect()->back();
	}
	public function test(){
		echo "<pre>";
		echo Cart::getTotalQuantity();
		//echo Cart::getInstanceName();exit();
		//echo "<pre>";
		//$ass=[{'name':'A'},{'name':'B'}]
		//echo "<pre>";
		//$contents= $contents->toJson();
		 /*  $ass->each(function($item){
			  echo $item['name'];
		  }); */
		//dd(Cart::getTotal());
		/* $condition = new \Darryldecode\Cart\CartCondition(array(
		'name' => 'VAT 12.5%',
		'type' => 'offer',
		'target' => 'total', 
		'value' => '-2%',
		'order'=>1,
			'attributes' => array(
				'description' => 'Value added tax',
				'more_data' => 'more data here'
			)
		));
			//echo "<pre>";
			//Cart::condition($condition);
			//Cart::clearCartConditions();
			$cartCollection = Cart::getContent();
			echo $cartCollection->count();
			echo "<br>";
			echo Cart::getTotalQuantity();
			echo "<br>";
			echo "<pre>";
			print_r(Cart::getCondition('VAT 12.5%'));
			echo Cart::getSubTotal();
			echo "<br>";
			echo Cart::getTotal();
			echo "<br>";
			echo Cart::getSubTotalWithoutConditions();
			//$condition = Cart::getCondition('VAT 12.5%');
			$conditionCalculatedValue = $condition->getCalculatedValue(Cart::getSubTotal());
			echo "<br>";
			echo $conditionCalculatedValue;
			//Cart::clear();
			 echo "<pre>";
			//print_r( Cart::getContent());  */
	}
 
}

