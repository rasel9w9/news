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
@if(in_array('21',$rolls))
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Advertisement</h2>
	</div>
	<div class="box-content">
		<form class="form-horizontal for-validation-form" action="{{URL::to('admin/save_advertisement')}}" method='post' enctype="multipart/form-data">
		@csrf
		  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Advertisement Name </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" id="typeahead" name='advertisement_name' value="<?=old('advertisement_name')?>">
				  </div>
				  <div class='controls'>@error('advertisement_name') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Advertisement Location </label>
				  <div class="controls">
				  	<select id="advertisement-location" class="form-control" name="advertisement_location">
					@foreach($adlocations as $addlocation)
						<option value="{{$addlocation->location_id}}">{{$addlocation->location_name}}</option>
					@endforeach
					</select>
				  </div>
				  <div class='controls'>@error('advertisement_location') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="fileInput">Advertiement Image</label>
					<div class="controls">
						<input class="input-file uniform_on" id="fileInput" type="file" name='advertisement_image' placeholder='Advertisement Image'>
					</div>
					<div class='controls error'>@error('advertisement_image') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Advertisement URL </label>
				  <div class="controls">
					<input type="url" class="span6 typeahead" name='advertisement_url' value="<?=old('advertisement_url')?>">
				  </div>
				  <div class='controls'>@error('advertisement_url') {{$message}} @enderror</div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Publication Status</label>
				  <div class="controls">
					<input type='checkbox' name='advertisement_status' value='1'/>
				  </div>
				  <div class='controls'>@error('advertisement_status') {{$message}} @enderror</div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Advertisement</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		</form>
	</div>
</div>
@else
	<h4>You dont have permission To Add Advertisement.Please Contact with Super Admin</h4>
@endif
</div>
@if(session('adv_msg'))
<div class="{{session('class')}}">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4><strong>Well done!</strong> {{session('adv_msg')}} </h4>
</div>
@endif
<div class='row-fluid sortable'>
	<div class='box span12'>
		<button class="btn btn-large btn-primary" id='showhide' html-text="+ Add Advertisement">+ Add Advertisement</button>
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>All Advertisements</h2>
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
					  <th width='5%'>ID</th>
					  <th>Name</th>
					  <th>Image</th>
					  <th>Url</th>
					  <th>Location</th>
					  <th>Status</th>
					  <th>Action</th>
				  </tr>
			  </thead>
			  <tbody>
			  @foreach($allAdvertisements as $advertisement)
				<tr>
					<td class="center"><?=$advertisement->advertisement_id?></td>
					<td class="center"><?=$advertisement->advertisement_name?></td>
					<td class="center">
						<img src="{{url('storage/app/'.$advertisement->advertisement_image)}}" width="75px" height="75px">
					</td>
					<td class="center"><?=$advertisement->advertisement_url?></td>
					<td class="center"><?=$advertisement->advertisement_location?></td>
					<td class="center">
						@if($advertisement->advertisement_status==0)
						<span class="label label-important">{{"Inactive"}}</span>
						@else
						<span class="label green">{{"Active"}}</span>
						@endif
					</td>
					<td class="center">
					@if(in_array('22',$rolls))
						@if($advertisement->advertisement_status==0)
						<a class="btn btn-success" href="{{route('catStatus',[$advertisement->advertisement_id,1])}}">
							<i class="halflings-icon white thumbs-up"></i>
						</a>
						@else
							<a class="btn btn-danger" href="{{route('catStatus',[$advertisement->advertisement_id,0])}}">
								<i class="halflings-icon white thumbs-down"></i>
							</a>
						@endif
						@if(in_array('22',$rolls))
							<a class="btn btn-info" href="{{URL::to('admin/edit_advertisement/'.$advertisement->advertisement_id)}}">
								<i class="halflings-icon white edit"></i>
							</a>
						@endif
						@if(in_array('23',$rolls))
							<a class="btn btn-danger" href="{{URL::to('admin/delete_advertisement/'.$advertisement->advertisement_id)}}">
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
