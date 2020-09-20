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
		<a href="#">Nav</a>
	</li>
</ul>
<!--<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		@if(session('cat_msg'))
		<div class="{{session('class')}}">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4><strong>Well done!</strong> {{session('cat_msg')}} </h4>
		</div>
		@endif
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
</div>-->
<div class='row-fluid sortable'>
	<div class='box span12'>
		<!--<button class="btn btn-large btn-primary">+ Add Category</button>-->
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Nav Operation</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class='box-content'>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Category NAME</th>
					  <th>Is Menu?</th>
					  <th>Order</th>
					  <th>Sub Menus</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  @foreach($allCategories as $category)
				<tr>
					<td class="center"><?=$category->category_name?></td>
					<td class="center">
						@if($category->menu_position==1)
						<span class="label green">{{"YES"}}</span>
						@else
						<span class="label warning">{{"NO"}}</span>
						@endif
					</td>
					<td class="center">
						<span class="label green">{{$category->menu_order}}</span>
					</td>
					<td class="center">
						<p>
						@foreach(explode(',',$category->sub_menu) as $sub_id)
							@php 
							echo @$allCategories
									->where('category_id',$sub_id)
									->first()->category_name;
							@endphp
						@endforeach
						</p>
					</td>
					<td class="center">
						@if(in_array('18',$rolls))
							@if($category->menu_position==0)
								<a class="btn btn-success" href="{{route('catStatus',[$category->category_id,1])}}">
									<i class="halflings-icon white thumbs-up"></i> 
								</a>
							@else
								<a class="btn btn-danger" href="{{route('catStatus',[$category->category_id,0])}}">
									<i class="halflings-icon white thumbs-down"></i> 
								</a>
							@endif
						@endif
						@if(in_array('17',$rolls))
							<a class="btn btn-info" href="{{URL::to('admin/edit_nav/'.$category->category_id)}}">
								<i class="halflings-icon white edit"></i>                                            
							</a>
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