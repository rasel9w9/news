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
		<a href="#">Upadate User</a>
	</li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Update User</h2>
		<!--<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>-->
	</div>
	<div class="box-content">
		<form class="form-horizontal for-validation-form" action="{{route('updateUser',$user->user_id)}}" method='POST' enctype='multipart/form-data'>
		@csrf
		  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Name </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead"  name='user_name' value="{{$user->user_name}}">
				  </div>
				  <div class='controls'>@error('user_name') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Image </label>
				  <div class="controls">
					<img src="{{url('storage/app/'.$user->user_image)}}" width="150px" height="150px">
					<input type="hidden" class="span6 typeahead" id="typeahead" name='old_image' value="{{$user->user_image}}">
					<input type="file" class="span6 typeahead" id="typeahead" name='user_image'>
				  </div>
				  <div class='controls'>@error('user_image') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Email </label>
				  <div class="controls">
					<input type="email" class="span6 typeahead"  name='user_email' value="{{$user->user_email}}">
				  </div>
				  <div class='controls'>@error('user_email') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Mobile </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" id="typeahead" name='user_mobile' value="{{$user->user_mobile}}">
				  </div>
				  <div class='controls'>@error('user_name') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Type </label>
				  <div class="controls">
					<select id="user-type" class="form-control" name="user_role">
						<option >Select Type</option>						
						<option <?= $user->user_role==1?"selected":null ?> value="1">Super Admin</option>
						<option <?= $user->user_role==2?"selected":null ?> value="2">Admin</option>
						<option <?= $user->user_role==3?"selected":null ?> value="3">Senior Editor</option>
						<option <?= $user->user_role==4?"selected":null ?> value="4">SubEditor</option>
					</select>
				  </div>
				  <div class='controls'>@error('user_type') {{$message}} @enderror</div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">User Status</label>
				  <div class="controls">
					<input <?= $user->user_status==1?"checked":null ?> type='checkbox' name='publication_status' value='1'/>
				  </div>
				  <div class='controls'>@error('publication_status') {{$message}} @enderror</div>
				</div>
				<div class="controls">
				  <button type="submit" class="btn btn-primary">Update User</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		</form>   
	</div>
	</div>
</div>
@endsection