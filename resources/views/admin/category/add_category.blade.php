@extends('admin/admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Forms</a>
	</li>
</ul>
<div class="row-fluid sortable showhide" style='display:none'>
@if(in_array('5',$rolls))
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
		<!--<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>-->
	</div>
	<div class="box-content">
		<form class="form-horizontal for-validation-form" action="{{URL::to('admin/save_category')}}" method='post'>
		@csrf
		  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Category Name </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" id="typeahead" name='category_name'  data-provide="typeahead" data-items="4" data-source='["Samesung","Xiaomi","Nokia"]'>
				  </div>
				  <div class='controls'>@error('category_name') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Category Type </label>
				  <div class="controls">
					<select id="cat-type" class="form-control" name="category_type">
						<option value="1">category</option>
						<option value="2">Page</option>
						<option value="3">Gallary</option>
						<option value="4">Videos</option>
					</select>
				  </div>
				  <div class='controls'>@error('category_type') {{$message}} @enderror</div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Category Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name='category_description'></textarea>
				  </div>
				  <div class='controls'>@error('category_description') {{$message}} @enderror</div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Publication Status</label>
				  <div class="controls">
					<input type='checkbox' name='category_status' value='1'/>
				  </div>
				  <div class='controls'>@error('category_status') {{$message}} @enderror</div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Category</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		</form>   
	</div>
</div>
@else
	<h4>You dont have permission To Add A Category.Please Contact with Super Admin</h4>
@endif
</div>
@if(session('cat_msg'))
<div class="{{session('class')}}">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4><strong>Well done!</strong> {{session('cat_msg')}} </h4>
</div>
@endif
<div class='row-fluid sortable'>
	<div class='box span12'>
		<button class="btn btn-large btn-primary" id='showhide' html-text="+ Add Category">+ Add Category</button>
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>All Categories</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<!--<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>-->
			</div>
		</div>
		<div class='box-content'>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th width='25%'>ID</th>
					  <th>NAME</th>
					  <th>TYPE</th>
					  <th>STATUS</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  @foreach($allCategories as $category)
				<tr>
					<td><?=$category->category_id?></td>
					<td class="center"><?=$category->category_name?></td>
					<td class="center"><?=$category->category_type?></td>
					<td class="center">
						@if($category->category_status==0)
						<span class="label label-important">{{"Inactive"}}</span>
						@else
						<span class="label green">{{"Active"}}</span>
						@endif
					</td>
					<td class="center">
					@if(in_array('8',$rolls))
						@if($category->category_status==0)
						<a class="btn btn-success" href="{{route('catStatus',[$category->category_id,1])}}">
							<i class="halflings-icon white thumbs-up"></i> 
						</a>
						@else
							<a class="btn btn-danger" href="{{route('catStatus',[$category->category_id,0])}}">
								<i class="halflings-icon white thumbs-down"></i> 
							</a>
						@endif
						@if(in_array('6',$rolls))
							<a class="btn btn-info" href="{{URL::to('admin/edit_category/'.$category->category_id)}}">
								<i class="halflings-icon white edit"></i>                                            
							</a>
						@endif
						@if(in_array('7',$rolls))
							<a class="btn btn-danger" href="{{URL::to('admin/delete_category/'.$category->category_id)}}">
								<i class="halflings-icon white trash"></i> 
							</a>
						@endif
					@endif
					</td>
				</tr>
				@endforeach
			  </tbody>
		  </table>          
		</div>
	</div>
</div>
@endsection