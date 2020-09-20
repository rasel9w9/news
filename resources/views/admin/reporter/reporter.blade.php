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
<div class="row-fluid sortable showhide" style='display:none'>
@if(in_array('9',$rolls))
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit closeToggle"></i><span class="break"></span>Add Reporter</h2>
			<div class="box-icon">
				<!--<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>-->
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal for-validation-form" action="{{URL::to('admin/save_reporter')}}" method='post' enctype='multipart/form-data'>
			@csrf
			  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Reporter Name </label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="typeahead" name='reporter_name' placeholder='Reporter Name'>
					  </div>
					  <div class='controls error'>@error('reporter_name') {{$message}} @enderror</div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Reporter Email </label>
					  <div class="controls">
						<input type="email" class="span6 typeahead" name='reporter_email' placeholder='Reporter Email'>
					  </div>
					  <div class='controls error'>@error('reporter_name') {{$message}} @enderror</div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Reporter Phone </label>
					  <div class="controls">
						<input type="number" class="span6 typeahead" name='reporter_mobile' placeholder='Reporter Phone'>
					  </div>
					  <div class='controls error'>@error('reporter_mobile') {{$message}} @enderror</div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Reporter Image </label>
					  <div class="controls">
						<input type="file" class="span6 typeahead" name='reporter_image'>
					  </div>
					  <div class='controls error'>@error('reporter_image') {{$message}} @enderror</div>
					</div>

					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Reporter Address</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" name='reporter_address'></textarea>
					  </div>
					  <div class='controls error'>@error('reporter_address') {{$message}} @enderror</div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Add Reporter</button>
					  <button type="reset" class="btn">Reset</button>
					</div>
			  </fieldset>
			</form>
		</div>
	</div>
@else
	<h4>You dont have permission To Add Reporter.Please Contact with Super Admin</h4>
@endif
</div>
@if(session('reporter_msg'))
<div class="{{session('class')}}">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4><strong>Well done!</strong> {{session('reporter_msg')}} </h4>
</div>
@endif
<div class='row-fluid sortable'>
	<div class='box span12'>
		<button class="btn btn-large btn-primary" id='showhide' html-text="+ Add Reporter">+ Add Reporter</button>
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>All Reporters</h2>
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
					  <th>ID NO.</th>
					  <th>NAME</th>
					  <th>EMAIL</th>
					  <th>PHONE</th>
					  <th>IMAGE</th>
					  <th>STATUS</th>
					  <th>Actions</th>
				  </tr>
			  </thead>
			  <tbody>
			  @foreach($allReporters as $reporter)
				<tr>
					<td><?=$reporter->reporter_id?></td>
					<td class="center"><?=$reporter->reporter_name?></td>
					<td class="center"><?=$reporter->reporter_email?></td>
					<td class="center"><?=$reporter->reporter_mobile?></td>
					<td class="center">
						<img src="{{url('storage/app/'.$reporter->reporter_image)}}" width='50px' height='50px'>
					</td>
					<td class="center">
						@if($reporter->reporter_status==0)
						<span class="label label-important">{{"Deactivated"}}</span>
						@else
						<span class="label green">{{"Activated"}}</span>
						@endif
					</td>
					<td class="center">
						@if(in_array('12',$rolls))
							@if($reporter->reporter_status==0)
								<a class="btn btn-success" href="{{route('reporterStatus',[$reporter->reporter_id,1])}}">
									<i class="halflings-icon white thumbs-up"></i>
								</a>
							@else
								<a class="btn btn-danger" href="{{route('reporterStatus',[$reporter->reporter_id,0])}}">
									<i class="halflings-icon white thumbs-down"></i>
								</a>
							@endif
						@endif
						@if(in_array('10',$rolls))
							<a class="btn btn-info" href="{{URL::to('admin/edit_reporter/'.$reporter->reporter_id)}}">
								<i class="halflings-icon white edit"></i>
							</a>
						@endif
						@if(in_array('11',$rolls))
							<a class="btn btn-danger" href="{{URL::to('admin/delete_reporter/'.$reporter->reporter_id)}}">
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
