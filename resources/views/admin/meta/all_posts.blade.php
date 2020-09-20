@extends('admin.admin_layout')
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
		<!--<h4 class="{{session('class')}}">{{session('post_msg')}}</h4>-->
		@if(session('post_msg'))
		<div class="{{session('class')}}">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4><strong>Well done!</strong> {{session('post_msg')}} </h4>
		</div>
		@endif
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th width='25%'>Post Title</th>
					  <th>Image</th>
					  <th>Category</th>
					  <th>Status</th>
					  <th width='15%'>Date/time</th>
					  <th>Reporter</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  @foreach($allPosts as $post)
				<tr>
					<td><?=$post->post_title?></td>
					<td class="center">
						<img height='45px' width='45px' src="{{URL::to('storage/app/'.$post->post_image)}}">
					</td>
					<td class="center"><?=$post->category_name?></td>
					<td class="center">
						@if($post->post_status==0)
						<span class="label label-important">{{"Not Published"}}</span>
						@else
						<span class="label green">{{"Published"}}</span>
						@endif
					</td>
					<td class="center">{{$post->post_date.' '.$post->post_time}}</td>
					<td class="center"><?=$post->reporter_name?></td>
					<td class="center">
						@if($post->post_status==0)
						<a class="btn btn-success" href="{{route('postStatus',[$post->post_id,1])}}">
							<i class="halflings-icon white thumbs-up"></i> 
						</a>
						@else
						<a class="btn btn-danger" href="{{route('postStatus',[$post->post_id,0])}}">
							<i class="halflings-icon white thumbs-down"></i> 
						</a>
						@endif
						<a class="btn btn-info" href="{{URL::to('admin/edit_post/'.$post->post_id)}}">
							<i class="halflings-icon white edit"></i>                                            
						</a>
						<a class="btn btn-danger" href="{{URL::to('admin/delete_post/'.$post->post_id)}}">
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