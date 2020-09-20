@extends('admin.admin_layout')
@section('admin_content')
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{url('admin/show_dashboard')}}">Dashboard</a></li>
	</ul>
	<div class="row-fluid">	
		<a class="quick-button metro yellow span2">
			<i class="icon-group"></i>
			<p>Users</p>
			<span class="badge">***</span>
		</a>
		<a class="quick-button metro blue span2" href="{{URL('waitting_orders')}}">
			<i class="icon-shopping-cart"></i>
			<p>Orders</p>
			<span class="badge">13</span>
		</a>
		<a class="quick-button metro green span2" href="{{URL('all_products')}}">
			<i class="icon-barcode"></i>
			<p>Products</p>
		</a>
		<a class="quick-button metro pink span2">
			<i class="icon-envelope"></i>
			<p>Messages</p>
			<span class="badge">***</span>
		</a>
		<a class="quick-button metro black span2">
			<i class="icon-calendar"></i>
			<p>Calendar</p>
		</a>
		<div class="clearfix"></div>			
	</div><br>
@endsection