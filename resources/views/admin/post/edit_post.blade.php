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
@if(in_array('2',$rolls))
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add post</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
		<h4 class="{{session('class')}}">{{session('post_msg')}}</h4>
			<form class="form-horizontal for-validation-form"  action="{{URL::to('admin/update_post/'.$post->post_id)}}" method='post' enctype='multipart/form-data'>
			@csrf
			  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">post Title </label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="typeahead" name='post_title'  data-provide="typeahead" data-items="4" data-source='["Samesung","Xiaomi","Nokia"]' value="<?= $post->post_title;?>" placeholder='Post Title'>
					  </div>
					  <div class='controls error'>@error('post_title') {{$message}} @enderror</div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">post Sub Title</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='post_sub_title' value="<?= $post->post_sub_title?>" placeholder='Post_Subtitle'>
					  </div>
					  <div class='controls error'>@error('post_sub_title') {{$message}} @enderror</div>
					</div> 
					<div class="control-group">
						<label class="control-label">Post Categories</label>
						@php $categories=DB::table('category_table')->get(); @endphp
						<div class="controls">
						@foreach($categories as $c)
						<?php 
							if(strpos($post->post_category_id,"$c->category_id")!==false){
								$chk="checked";
							}else{$chk=null;}
						?>
						  <label class="checkbox inline">
							<input <?= $chk ?> type="checkbox" id="inlineCheckbox1" name="post_category_id[]" value="{{$c->category_id}}">  <?=$c->category_name?>
						  </label>
						@endforeach
						</div>
						<div class='controls error'>@error('post_category_id') {{$message}} @enderror</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="fileInput">post Image</label>
						<div class="controls">
							<input type="hidden"  name="oldimage"  value="{{$post->post_image}}">
							<input class="input-file uniform_on" id="fileInput" type="file" name='post_image' placeholder='Post Image'><img width='25%' src="{{url('storage/app/'.$post->post_image)}}">
						</div>
						<div class='controls error'>@error('post_image') {{$message}} @enderror</div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Image Caption</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='image_caption' value="<?=$post->image_caption;?>" placeholder='Post Image caption'>
					  </div>
					  <div class='controls error'>@error('image_caption') {{$message}} @enderror</div>
					</div>
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">post Description</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" width='100%' name='post_description'><?= $post->post_description;?></textarea>
					  </div>
					  <div class='controls error'>@error('post_description') {{$message}} @enderror</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError">Reporter</label>
						<div class="controls">
						<select id="selectError" data-rel="chosen" name='reporter'>
						@php $reporters=DB::table('reporter_table')->select('reporter_id','reporter_name')->get(); @endphp
						@foreach($reporters as $reporter)
							<option value='{{$reporter->reporter_id}}'><?=$reporter->reporter_name?></option>
						@endforeach
						  </select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">post Attributes</label>
						<div class="controls">
							<label class="checkbox inline">
								<input <?=$post->scroll ? 'checked':false; ?> type="checkbox" value='1' name='scroll'> Scrolling
							</label>
							<label class="checkbox inline">
								<input <?=$post->lead_news ? 'checked':false; ?> type="checkbox" value='1'  name='lead_news'> Lead News
							</label>
							<label class="checkbox inline">
								<input <?=$post->top_news ? 'checked':false; ?> type="checkbox" value='1'  name='top_news'> Top News
							</label>
							<label class="checkbox inline">
								<input <?=$post->category_pin ? 'checked':false; ?> type="checkbox" value='1'   name='category_pin'> Category Pin News
							</label>
						</div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Video youtube id</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='video_id' value="<?= $post->video_id; ?>" placeholder='Enter Video id'>
					  </div>
					  <div class='controls error'>@error('video_id') {{$message}} @enderror</div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Related News ID</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='related_news_id' value="<?= $post->related_news_id; ?>" placeholder="Related News ID (Comma Separeted No Space)">
					  </div>
					  <div class='controls error'>@error('video_id') {{$message}} @enderror</div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">SEO Key Words</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead"  name='seo_keyword' value="<?= $post->seo_keyword; ?>" placeholder='Seo Key word(Comma separated No Space)' name='seo_keyword'>
					  </div>
					  <div class='controls error'>@error('seo_keyword') {{$message}} @enderror</div>
					</div>
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Seo Description</label>
					  <div class="controls">
						<textarea   rows="3"  name='seo_description' style="width:389px;" placeholder='Seo Description'><?= $post->seo_description; ?></textarea>
					  </div>
					  <div class='controls error'>@error('seo_description') {{$message}} @enderror</div>
					</div>
					<div class="control-group">
						<label class="control-label">Publication Status</label>
						<div class="controls">
						  <label class="radio">
							<input type="radio"  name="post_status" id="optionsRadios1" value="1" checked>
							Published
						  </label>
						  <div style="clear:both"></div>
						  <label class="radio">
							<input <?= $post->post_status==0?'checked':false;?> type="radio" name="post_status" id="optionsRadios2" value="0">
							Drafts
						  </label>
						</div>
						<div class='controls error'>@error('publication_status') {{$message}} @enderror</div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Update post</button>
					  <button type="reset" class="btn">Reset</button>
					</div>
			  </fieldset>
			</form>   
		</div>
		
	</div>
</div>
@else
	<h4>You dont have permission To Edit A post.Please Contact with Super Admin</h4>
@endif
@endsection