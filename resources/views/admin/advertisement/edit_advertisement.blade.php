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
@if(in_array('6',$rolls))
<div class="row-fluid sortable">
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
		<form class="form-horizontal for-validation-form" action="{{route('updateCat',$category->category_id)}}" method='post'>
		@csrf
		  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Category Name </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" id="typeahead" name='category_name' value="<?=$category->category_name?>">
				  </div>
				  <div class='controls'>@error('category_name') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Category Type </label>
				  <div class="controls">
					<select id="cat-type" class="form-control" name="category_type">
						<option value="<?=$category->category_type?>"></option>
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
					<textarea class="cleditor" id="textarea2" rows="3" name='category_description'><?=$category->category_description;?></textarea>
				  </div>
				  <div class='controls'>@error('category_description') {{$message}} @enderror</div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Publication Status</label>
				  <div class="controls">
					@if($category->category_status==1)
					<input checked type='checkbox' name='category_status' value='1'/>
					@else
					<input type='checkbox' name='category_status' value='1'/>
					@endif
				  </div>
				  <div class='controls'>@error('category_status') {{$message}} @enderror</div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update Category</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		</form>   
	</div>
	</div>
</div>
@else
	<h4>You dont have permission To Edit A Category.Please Contact with Super Admin</h4>
@endif
@endsection