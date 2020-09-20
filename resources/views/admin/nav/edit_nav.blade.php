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
@if(in_array('17',$rolls))
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Menu Changing</h2>
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
		<form class="form-horizontal for-validation-form" action="{{route('updateNav',$category->category_id)}}" method='post'>
		@csrf
		  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Menu Name </label>
				  <div class="controls">
					<input type="text" disabled class="span6 typeahead" id="typeahead" name='category_name' value="<?=$category->category_name?>">
				  </div>
				  <div class='controls'>@error('category_name') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label">Is Menu?</label>
				  <div class="controls">
					 <label class="checkbox inline">
						<input checked type="radio" id="inlineCheckbox1" name="post_category_id[]" value="1">
						<span class="label green">{{"YES"}}</span>
					  </label>
					  <label class="checkbox inline">
						<input <?= $category->menu_position!=1?'checked':null ?> type="radio"  id="inlineCheckbox1" name="post_category_id[]" value="0">
						<span class="label warning">{{"NO"}}</span>
					  </label>
				  </div>
				  <div class='controls'>@error('category_type') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Menu Order </label>
				  <div class="controls">
					<input type="number"  class="span3 typeahead" id="typeahead" name='category_name' value="<?=$category->menu_order?>">
				  </div>
				  <div class='controls'>@error('category_name') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
					<label class="control-label">Select Sub Menus</label>
					@php $categories=DB::table('category_table')->get(); @endphp
					<div class="controls">
					@foreach($categories as $c)
					<?php
						if(strpos($category->sub_menu,"$c->category_id")!==false){
							$chk="checked";
						}else{$chk=null;}
					?>
					  <label class="checkbox inline">
						<input type="checkbox" <?=$chk?> id="inlineCheckbox1" name="post_category_id[]" value="{{$c->category_id}}"> <?=$c->category_name?>
					  </label>
					@endforeach
					</div>
					<div class='controls error'>@error('post_category_id') {{$message}} @enderror</div>
				</div>
				<!--<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Publication Status</label>
				  <div class="controls">
					@if($category->category_status==1)
					<input checked type='checkbox' name='category_status' value='1'/>
					@else
					<input type='checkbox' name='category_status' value='1'/>
					@endif
				  </div>
				  <div class='controls'>@error('category_status') {{$message}} @enderror</div>
				</div>-->
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Change</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		</form>   
	</div>
	</div>
</div>
@else
	<h4>You dont have permission To Edit Menu Setting.Please Contact with Super Admin</h4>
@endif
@endsection