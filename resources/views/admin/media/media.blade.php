@extends('admin/admin_layout')
@section('admin_content')
	
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Gallery</a></li>
</ul>
<div class="row-fluid sortable">
	@if(in_array('20',$rolls))
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon picture"></i><span class="break"></span> Gallery</h2>
			<div class="box-icon">
				<a href="#" id="toggle-fullscreen" class="hidden-phone hidden-tablet"><i class="halflings-icon fullscreen"></i></a>
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class='box-content'>
			<form class="form-horizontal for-validation-form" action="{{URL::to('save_category')}}" method='post'>
				<fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Select Image </label>
					  <div class="controls">
						<input type="file" class="span6 typeahead" id="typeahead" name='image'  data-provide="typeahead" data-items="4" data-source='["Samesung","Xiaomi","Nokia"]'>
					  </div>
					  <div class='controls'>@error('category_image') {{$message}} @enderror</div>
					  <div class='controls'><br>
					  <button type="submit" class="btn btn-primary">Add Category</button>
					  <button type="reset" class="btn">Reset</button>
					  </div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	@endif
	<div class="row-fluid">
		<?php $number=0; ?>
		@foreach($allMedias as $media)
		<?php $number++; ?>
		<div id="image-{{$number}}" class="masonry-thumb" style='display:inline'>
			<a style="background:url({{url('storage/app/'.$media->media_image)}})" title="Sample Image 1" href="{{url('storage/app/'.$media->media_image)}}">
				<img width='20%' height='75px' class="grayscale" src="<?=url('storage/app/'.$media->media_image)?>" alt="Sample Image 1"/>
			</a>
		</div>
		@endforeach();
	</div>
</div>
@endsection()