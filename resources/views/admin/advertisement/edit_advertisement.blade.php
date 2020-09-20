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
@if(in_array('22',$rolls))
<div class="row-fluid sortable">
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
					<input type="text" class="span6 typeahead" id="typeahead" name='advertisement_name' value="{{$advertisement->advertisement_name}}">
				  </div>
				  <div class='controls error'>@error('advertisement_name') {{$message}} @enderror</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Advertisement Location </label>
				  <div class="controls">
				  @php
				  	$adlocations=DB::table('ad_location')->get();
					$selectedLoacation=$advertisement->advertisement_location;
				  @endphp
				  	<select id="advertisement-location" class="form-control" name="advertisement_location">
					@foreach($adlocations as $adlocation)
					<?php $addlocation->location_id==$selectedLoacation?$sl="selected":$sl=null;?>
						<option {{@$sl}} value="{{$addlocation->location_id}}">
							{{$adlocation->location_name}}
						</option>
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
				  <div class='controls error'>@error('advertisement_url') {{$message}} @enderror</div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Publication Status</label>
				  <div class="controls">
					<input type='checkbox' name='advertisement_status' value='1'/>
				  </div>
				  <div class='controls error'>@error('advertisement_status') {{$message}} @enderror</div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">End Date</label>
				  <div class="controls">
					<input type='date' name='end_at' value="<?=old('end_at')?>"/>
				  </div>
				  <div class='controls error'>@error('end_at') {{$message}} @enderror</div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update Advertisement</button>
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
