$(document).ready(function(){
	$("form.for-validation-form").validate({
			rules:{
				product_name:'required',
				cupon_code:'required',
				product_stock:{required:true,number:true,min:1},
				product_description:'required',
				product_price:{required:true,number:true,min:10},
				product_image:'required',
				category_name:'required',
				manufacture_name:'required',
				start_date:{required:true,date:true},
				end_date:{required:true,date:true},
				cupon_times:{number:true,min:1},
				discount:{required:true,number:true,min:1,date:false}
			},
			messages:{
				product_name:"Product Name Required",
				product_stock:{
					required:'Stock required',
					number:'Invalid Stock',
					min:'Stock must be at least 1'
				},
				product_price:{
					required:'Price required',
					number:'Invalid Price',
					min:'Price must be greater than 10'
				},
				product_description:"Product Description Required",
				product_image:"Image required",
				category_name:"Category Name Required",
				manufacture_name:"Manufacture Name Required",
				cupon_code:"Cupon Code Required",
				start_date:{required:"Sart Date Required"},
				end_date:{required:"End Date Required"},
				discount:{
					required:"Discount Required",
					number:"Invalid Discount",
					min:"Discount Must be greater than 0"
				},
			},
			submitHandler:function(form){
				form.submit();
			}
		});
	$('.order-back').click(function(){
		/* $.ajaxSetup({
			headers:{'x-CSRF-TOKEN':$('meta[name=["csrf-token"]').attr('content')}
		}) */
		/* var id=[];
		$('tr .products-id-backorder').each(function (){
			var value=$(this).html();
			array.push();
		}); */
		var order_id=$('#order-id-backorder').html();
		var products_id=$('tr .products-id-backorder').map(function (i,v){
			return $(this).html();
		}).toArray();
		var products_qty=$('tr .products-qty-backorder').map(function (i,v){
			return $(this).html();
		}).toArray();
		$.ajax({
			url:"http://localhost/lara-ecomerce/back_order/",
			method:'get',
			data:{order_id:order_id,products_id:products_id,products_qty:products_qty},
			success:function(result){
				var url="http://localhost/lara-ecomerce/sent_orders";
				window.location.href=url;
			}
		})
	})
})