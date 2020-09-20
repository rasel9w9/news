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
@if(in_array('19',$rolls))
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Meta</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
		<h4 class="{{session('class')}}">{{session('meta_msg')}}</h4>
			<form class="form-horizontal for-validation-form"  action="{{URL::to('admin/save_meta')}}" method='POST' enctype='multipart/form-data'>
			@csrf
			  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Site Name </label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="typeahead" name='site_name' value="<?= $meta->site_name?>" placeholder='Site Name'>
					  </div>
					  <div class='controls error'>@error('site_name') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Site Title</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='site_title' value="<?= $meta->site_title?>" placeholder='Site Title'>
					  </div>
					  <div class='controls error'>@error('site_title') {{$message}} @enderror</div>
					</div> 
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Site Keywords</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='site_keywords' value="<?= $meta->site_keywords?>" placeholder='Site Keywords'>
					  </div>
					  <div class='controls error'>@error('site_keywords') {{$message}} @enderror</div>
					</div> 
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Site email</label>
					  <div class="controls">
						<input type="email" class="span6 typeahead"  name='site_email' value="<?= $meta->site_email?>" placeholder='Site Keywords'>
					  </div>
					  <div class='controls error'>@error('site_email') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Site Number</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='site_number' value="<?= $meta->site_number?>" placeholder='Site Number'>
					  </div>
					  <div class='controls error'>@error('site_number') {{$message}} @enderror</div>
					</div> 
					
					<div class="control-group">
						<label class="control-label" for="fileInput">Site Logo</label>
						<div class="controls">
							<input class="input-file uniform_on" id="fileInput" type="file" name='site_logo' placeholder='Site Logo'>
							<img width='150px' src="{{url('storage/app/'.$meta->site_logo)}}">
						</div>
						<div class='controls error'>@error('site_logo') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="fileInput">Site Icon</label>
						<div class="controls">
							<input class="input-file uniform_on" id="fileInput" type="file" name='site_icon' placeholder='Site Icon'>
							<img width='150px' src="{{url('storage/app/'.$meta->site_icon)}}">
						</div>
						<div class='controls error'>@error('site_icon') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Site Description</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" width='100%' name='site_description'><?=$meta->site_description?></textarea>
					  </div>
					  <div class='controls error'>@error('site_description') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Facebook Link</label>
					  <div class="controls">
						<input type="url" class="span6 typeahead"  name='facebook' value="<?=$meta->facebook?>" placeholder='Site Keywords'>
					  </div>
					  <div class='controls error'>@error('facebook') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Twitter Link</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='twitter' value="<?=$meta->twitter?>" placeholder='Site Keywords'>
					  </div>
					  <div class='controls error'>@error('twitter') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Linkedin Link</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='linkedin' value="<?=$meta->linkedin?>" placeholder='Linkedin Link'>
					  </div>
					  <div class='controls error'>@error('linkedin') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Google Map(Latitude)</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='map_latitude' value="<?=$meta->map_latitude?>" placeholder='Map Latitude'>
					  </div>
					  <div class='controls error'>@error('map_latitude') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Google Map(Longitude)</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='map_longitude' value="<?=$meta->map_longitude?>" placeholder='Map Latitude'>
					  </div>
					  <div class='controls error'>@error('map_longitude') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Site Address 1</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" width='100%' name='site_address_1'><?=$meta->site_address_1?></textarea>
					  </div>
					  <div class='controls error'>@error('site_address_1') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Site Address 2</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" width='100%' name='site_address_2'><?=$meta->site_address_2?></textarea>
					  </div>
					  <div class='controls error'>@error('site_address_2') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Site Address 3</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" width='100%' name='site_address_3'><?=$meta->site_address_3?></textarea>
					  </div>
					  <div class='controls error'>@error('site_address_3') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Site Address 4</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" width='100%' name='site_address_4'><?=$meta->site_address_4?></textarea>
					  </div>
					  <div class='controls error'>@error('site_address_4') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Android App link</label>
					  <div class="controls">
						<input type="url" class="span6 typeahead"  name='google_play' value="<?=$meta->google_play?>" placeholder='Android App Link'>
					  </div>
					  <div class='controls error'>@error('google_play') {{$message}} @enderror</div>
					</div>
					
					<div class="control-group">
					  <label class="control-label" for="typeahead">Apple Store</label>
					  <div class="controls">
						<input type="url" class="span6 typeahead"  name='apple_store' value="<?=$meta->apple_store?>" placeholder='Apple App Link'>
					  </div>
					  <div class='controls error'>@error('google_play') {{$message}} @enderror</div>
					</div>
					
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Save Meta</button>
					</div>
			  </fieldset>
			</form>   
		</div>
		
	</div>
</div>
@else
	<h4>You dont have permission To Edit Meta settings.Please Contact with Super Admin</h4>
@endif
@endsection