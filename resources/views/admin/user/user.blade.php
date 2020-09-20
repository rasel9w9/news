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
		<a href="#">User</a>
	</li>
</ul>
<style>
.error{color:maroon;}
</style>
<div class="row-fluid sortable showhide" style='display:none'>
@if(in_array('13',$rolls))
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Add User</h2>
		<!--<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>-->
	</div>
	<div class="box-content">
		<form class="form-horizontal for-validation-form" action="{{URL::to('admin/save_user')}}" method='POST' enctype='multipart/form-data'>
		@csrf
		  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Name </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead"  name='user_name' value="<?= old('user_name')?>" placeholder='Enater your name'>
				  </div>
				  <div class='controls error'>@error('user_name') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Image </label>
				  <div class="controls">
					<input type="file" class="span6 typeahead"  name='user_image' >
				  </div>
				  <div class='controls error'>@error('user_image') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Email </label>
				  <div class="controls">
					<input type="email" class="span6 typeahead"  name='user_email' value="<?= old('user_email')?>" placeholder='Enter your email'>
				  </div>
				  <div class='controls error'>@error('user_email') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Mobile </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead"  name='user_mobile' value="<?= old('user_mobile')?>" placeholder='Enter your mobile'>
				  </div>
				  <div class='controls error'>@error('user_mobile') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Role </label>
				  <div class="controls">
					<select id="cat-type" class="form-control" name="user_role">
						<option >Select Role</option>
						<option value="1">Super Admin</option>
						<option value="1">Admin</option>
						<option value="2">Senior Editor</option>
						<option value="2">Sub Editor</option>
					</select>
				  </div>
				  <div class='controls error'>@error('user_type') {{$message}} @enderror</div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">User Status</label>
				  <div class="controls">
					<input type='checkbox' name='user_status' value='1'/>
				  </div>
				  <div class='controls error'>@error('user_status') {{$message}} @enderror</div>
				</div>
				<div class="controls">
				  <button type="submit" class="btn btn-primary">Add User</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		</form>   
	</div>
	</div>
@else
	<h4>You dont have permission To Add User.Please Contact with Super Admin</h4>
@endif
</div>
@if(session('user_msg'))
<div class="{{session('class')}}">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4><strong>Well done!</strong> {{session('user_msg')}} </h4>
</div>
@endif
<div class='row-fluid sortable'>
	<div class='box span12'>
	<button class="btn btn-large btn-primary" id='showhide' html-text="+ Add User">+ Add User</button>
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
					  <th>ID</th>
					  <th>NAME</th>
					  <th>IMAGE</th>
					  <th>EMAIL</th>
					  <th>Mobile</th>
					  <th>Role</th>
					  <th>Status</th>
					  <th>Action</th>
				  </tr>
			  </thead>   
			   <tbody>
			  @foreach($allUsers as $user)
				<tr>
					<td><?=$user->user_id?></td>
					<td class="center"><?=$user->user_name?></td>
					<td class="center">
						<img height='45px' width='45px' src="{{URL::to('storage/app/'.$user->user_image)}}">
					</td>
					<td class="center"><?=$user->user_email?></td>
					<td class="center"><?=$user->user_mobile?></td>
					<td class="center"><?=$user->user_role?></td>
					<td class="center">
						@if($user->user_status==0)
						<span class="label label-important">{{"Disabled"}}</span>
						@else
						<span class="label green">{{"Enabled"}}</span>
						@endif
					</td>
					<td class="center">
						@if(in_array('16',$rolls))
							@if($user->user_status==0)
								<a class="btn btn-success" href="{{URL::to('admin/user/status/'.$user->user_id.'/1')}}">
									<i class="halflings-icon white thumbs-up"></i> 
								</a>
							@else
								<a class="btn btn-danger" href="{{URL::to('admin/user/status/'.$user->user_id.'/0')}}">
									<i class="halflings-icon white thumbs-down"></i> 
								</a>
							@endif
						@endif
						@if(in_array('14',$rolls))
							<a class="btn btn-info" href="{{URL::to('admin/edit_user/'.$user->user_id)}}">
								<i class="halflings-icon white edit"></i>                                            
							</a>
						@endif
						@if(in_array('15',$rolls))
							<a class="btn btn-danger" href="{{URL::to('admin/delete_user/'.$user->user_id)}}">
								<i class="halflings-icon white trash"></i> 
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