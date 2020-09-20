@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
		{{session('publication_msg')}}
		{{session('edit_cat_msg')}}
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Category ID</th>
					  <th>Category Name</th>
					  <th>Category Description</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  @foreach($allcategories as $category)
				<tr>
					<td>{{$category->category_id}}</td>
					<td class="center">{{$category->category_name}}</td>
					<td class="center">{{$category->category_description}}</td>
					<td class="center">
						@if($category->publication_status==0)
						<span class="label label-important">{{"Not Published"}}</span>
						@else
						<span class="label green">{{"Published"}}</span>
						@endif
					</td>
					<td class="center">
						@if($category->publication_status==0)
						<!--<i class="halflings-icon white zoom-in"></i> -->
						<a class="btn btn-success" href="{{URL::to('publication/'.$category->category_id.'/1')}}">
							<i class="halflings-icon white thumbs-up"></i> 
						</a>
						@else
						<a class="btn btn-danger" href="{{URL::to('publication/'.$category->category_id.'/0')}}">
							<i class="halflings-icon white thumbs-down"></i> 
						</a>
						@endif
						<a class="btn btn-info" href="{{URL::to('edit_category/'.$category->category_id)}}">
							<i class="halflings-icon white edit"></i>                                            
						</a>
						<a class="btn btn-danger" href="{{URL::to('category_delete/'.$category->category_id)}}" id='delete' onclick='cat_delete()'>
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				@endforeach
			  </tbody>
		  </table>            
		</div>
	</div>
	
</div>
@endsection