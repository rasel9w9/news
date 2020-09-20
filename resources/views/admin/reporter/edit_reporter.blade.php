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
<style>
.error{color:maroon;}
</style>
@if(in_array('10',$rolls))
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Reporter</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		@if(session('reporter_msg'))
		<div class="{{session('class')}}">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4><strong>Well done!</strong> {{session('reporter_msg')}} </h4>
		</div>
		@endif
		<form class="form-horizontal for-validation-form" action="{{route('updateReporter',$reporter->reporter_id)}}" method='post' enctype='multipart/form-data'>
		@csrf
		  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Reporter Name </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" id="typeahead" name='reporter_name' placeholder='Reporter Name' value="<?=$reporter->reporter_name?>">
				  </div>
				  <div class='controls error'>@error('reporter_name') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Reporter Email </label>
				  <div class="controls">
					<input type="email" class="span6 typeahead" name='reporter_email' placeholder='Reporter Email' value="<?=$reporter->reporter_email?>">
				  </div>
				  <div class='controls error'>@error('reporter_email') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Reporter Phone </label>
				  <div class="controls">
					<input type="number" class="span6 typeahead" name='reporter_mobile' placeholder='Reporter Phone' value="<?=$reporter->reporter_mobile?>">
				  </div>
				  <div class='controls error'>@error('reporter_mobile') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				 <label class="control-label" for="typeahead">Reporter Image </label>
				  <div class="controls">
					<input type="file" class="span6 typeahead" name='reporter_image'>
					<img src="{{url('storage/app/'.$reporter->reporter_image)}}" width='150px' height='150px'>
				  </div>
				  <div class='controls error'>@error('reporter_image') {{$message}} @enderror</div>
				</div>
				
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Reporter Address</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name='reporter_address'><?=$reporter->reporter_address?></textarea>
				  </div>
				  <div class='controls error'>@error('reporter_address') {{$message}} @enderror</div>
				</div>
				<div>
					<input type='hidden' name='oldimage' value="<?=$reporter->reporter_image?>">
					<input type='hidden' name='oldemail' value="<?=$reporter->reporter_email?>">
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update Reporter</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		</form>   
	</div>
	</div>
</div>
@else
	<h4>You dont have permission To Edit Reporter.Please Contact with Super Admin</h4>
@endif
@endsection