@php 
	function convTime($time_from_news){		
		$currentTime = date('h:i', strtotime($time_from_news));
		$am_pm = date('a', strtotime($time_from_news));
		if($am_pm == "am"){
			$am_pm = "এএম";
		}
		if($am_pm == "pm"){
			$am_pm = "পিএম";
		}
		
		$engTime = array(1,2,3,4,5,6,7,8,9,0);
		$bangTime = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
		$convertedTime = str_replace($engTime,$bangTime,$currentTime);
		echo $convertedTime." ".$am_pm;
	}
	
	function convDate($date_from_news){
		
		$currentDate = $date_from_news; 
		$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
		$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
		বুধবার','বৃহস্পতিবার','শুক্রবার');			
		$convertedDATE = str_replace($engDATE,$bangDATE,$currentDate);
		echo $convertedDATE;	
	}
@endphp
<section class="body">
	<div class="container">
		<div class="row homePageContent">
			<!-- Main Division Starts -->
			<div class="no_padding col-md-12 col-sm-12 col-xs-12">
				<!--First news content -->
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="no_padding col-md-9 col-sm-12 col-xs-12">
						<div class="no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="no_padding col-md-8 col-sm-12 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12 top_padding">
									<div class="big_news_type no_padding col-md-12 col-sm-12 col-xs-12">
										<a href="<?=url('/').'/news-view/'.$lead_news->post_id.'/'.str_replace(' ','-',$lead_news->post_title);?>"><img src="<?=url('/storage/app/'.$lead_news->post_image);?>" alt="<?=$lead_news->post_title;?>" /></a>
										<h3><a href="<?=url('/').'news-view/'.$lead_news->post_id.'/'.str_replace(' ','-',$lead_news->post_title);?>"><?=$lead_news->post_title;?></a></h3>								
									</div>
								</div>
								
								<div class="col-md-12 col-sm-12 col-xs-12 no_padding"><br>
									@foreach ($top_newses->slice(0,2) as $top_news)		
									<div class=" col-md-6 col-sm-6 col-xs-12">
										<div class="small_news_item_1 col-md-12 col-sm-12 col-xs-12">
											<a href="<?=url('/').'/news-view/'.$top_news->post_id.'/'.str_replace(' ','-',$top_news->post_title);?>"><img src="<?=url('/storage/app/'.$top_news->post_image);?>" alt="<?=$top_news->post_title;?>" /></a>
											<!-- <p class="slider_time_date_normal"><i class="fa fa-clock-o" aria-hidden="true"></i> ২২:০৭, মে ২৩, ২০১৮</p> -->
											<h4><a href="<?=url('/').'/news-view/'.$top_news->post_id.'/'.str_replace(' ','-',$top_news->post_title);?>"><?=$top_news->post_title;?></a></h4>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							<div class="top_padding no_padding col-md-4 col-sm-12 col-xs-12">
								@foreach ($top_newses->slice(2,3) as $top_news)		
								<div class=" col-md-12 col-sm-6 col-xs-12">
									<div class="small_news_item_1 col-md-12 col-sm-12 col-xs-12">
										<a href="<?=url('/').'/news-view/'.$top_news->post_id.'/'.str_replace(' ','-',$top_news->post_title);?>"><img src="<?=url('/storage/app/'.$top_news->post_image);?>" alt="<?=$top_news->post_title;?>" /></a>
										<!-- <p class="slider_time_date_normal"><i class="fa fa-clock-o" aria-hidden="true"></i> ২২:০৭, মে ২৩, ২০১৮</p> -->
										<h4><a href="<?=url('/').'/news-view/'.$top_news->post_id.'/'.str_replace(' ','-',$top_news->post_title);?>"><?=$top_news->post_title;?></a></h4>
									</div>
								</div>
								@endforeach
							</div>
							<!-- add content -->
							<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
								<?php $adv=$ad->where('advertisement_location',2)->first(); ?>
								@if($adv)
								<div class="hidden-xs bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
									<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
										<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
											<img src="<?=url('/storage/app/'.$adv->advertisement_image);?>" alt="<?=$adv->advertisement_name;?>"  title="<?=$adv->advertisement_name;?>"/>
										</a>
									</div>
								</div>
								@endif
								<?php $adv=$ad->where('advertisement_location',3)->first(); ?>
								@if($adv)
								<div class="hidden-xs bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
									<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
										<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
											<img src="<?=url('/storage/app/'.$adv->advertisement_image);?>" alt="<?=$adv->advertisement_name;?>"  title="<?=$adv->advertisement_name;?>"/>
										</a>
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>	
					<div class="col-md-3 col-sm-12 col-xs-12">
						<!-- add content -->
						@php $adv=$ad->where('advertisement_location',4)->first(); @endphp
						@if($adv)
						<div class="hidden-xs top_padding no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="rightNewsAdd col-md-12 col-sm-12 col-xs-12 no_padding">
								<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
									<img src="<?=url('/storage/app/'.$adv->advertisement_image);?>" alt="<?=$adv->advertisement_name;?>"  title="<?=$adv->advertisement_name;?>"/>
								</a>
							</div>
						</div>
						@endif
						@php $adv=$ad->where('advertisement_location',5)->first(); @endphp
						@if($adv)
						<div class="hidden-xs top_padding no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="rightNewsAdd col-md-12 col-sm-12 col-xs-12 no_padding">
								<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
									<img src="<?=url('/storage/app/'.$adv->advertisement_image);?>" alt="<?=$adv->advertisement_name;?>"  title="<?=$adv->advertisement_name;?>"/>
								</a>
							</div>
						</div>
						@endif
					</div>
				</div>
				<!--second news content -->
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="no_padding col-md-8 col-sm-12 col-xs-12">
						@php $cat=$categories->where('category_id',1)->first(); @endphp
						<div class="col-md-12 col-sm-12 col-xs-12">
							<a href="<?=url('/').'/category/'.$cat->category_id."?c=".$cat->category_name;?>">
							<h3 class='content_heading'><span><?=$cat->category_name;?></span></h3>
							</a>
						</div>
						@php
							$second_section_news=$allPost->filter(function($post){
								if(strpos($post->post_category_id,'1')>-1){
									return $post;
								} 
							});
							$news=$second_section_news->first();
						@endphp
						<div class="no_padding col-md-7 col-sm-12 col-xs-12">
							@if($news->video_id)
							<div class="col-md-12 col-sm-12 col-xs-12 video-section no_padding">
								<div class=" col-md-12 col-sm-12 col-xs-12">
									<div class="video-news no_padding col-md-12 col-sm-12 col-xs-12">

										<iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$news->video_id;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><h3><?=$news->post_title;?></h3></a>
									</div>
							   </div>
							</div>
							@else
							<div class="col-md-12 col-sm-12 col-xs-12 video-section no_padding">
								<div class=" col-md-12 col-sm-12 col-xs-12">
									<div class="video-news no_padding col-md-12 col-sm-12 col-xs-12">
										<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">
											<img src="<?=url('/storage/app/'.$news->post_image);?>" alt="<?=$news->post_title;?>">
										</a>
										<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><h3><?=$news->post_title;?></h3></a>
									</div>
							   </div>
							</div>
							@endif
						</div>
						<div class="no_padding col-md-5 col-sm-12 col-xs-12">
							@php $newses=$second_section_news->take(5); @endphp
							@foreach($newses as $news)
							<div class="no_padding col-md-12 col-sm-6 col-xs-12">
								<div class="small_news_type col-md-12 col-sm-12 col-xs-12">
									<div class="no_padding col-md-4 col-sm-4 col-xs-3">
										<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img class="img-thumbnail" src="<?=url('storage/app').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
									</div>
									
									<div class="no_padding col-md-8 col-sm-8 col-xs-9">
										<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					
					</div>
					<div class="no_padding col-md-4 col-sm-12 col-xs-12">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="tab">
								<button class="tablinks active" onclick="openCity(event, 'latest')" id="defaultOpen">সর্বশেষ</button><button class="tablinks" onclick="openCity(event, 'most')">সর্বাধিক পঠিত</button>
							</div>
							<div id="latest" class="tabcontent latest_news_con" style="display: block;">
								<br>
								@foreach($latest_news as $news)
								<div class="no_padding col-md-12 col-sm-6 col-xs-12">
									<div class="small_news_type col-md-12 col-sm-12 col-xs-12">
										<div class="no_padding col-md-4 col-sm-4 col-xs-3">
											<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img class="img-thumbnail" src="<?=url('/storage/app/').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
										</div>
										
										<div class="no_padding col-md-8 col-sm-8 col-xs-9">
											<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div id="most" class="tabcontent latest_news_con" style="display: none;">
								<br>
								@foreach($most_viewed as $news)
								<div class="no_padding col-md-12 col-sm-6 col-xs-12">
									<div class="small_news_type no_padding col-md-12 col-sm-12 col-xs-12">
										<div class="no_padding col-md-4 col-sm-4 col-xs-3">
											<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img src="<?=url('/storage/app/').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
										</div>
										
										<div class="no_padding col-md-8 col-sm-8 col-xs-9">
											<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							
						</div>
					</div>
				</div>
				<!-- add content -->
				<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
				@php $advs=$ad->whereIn('advertisement_location',['6','7']); @endphp
				@if($advs->count()>0)
					@foreach($advs as $adv)
					<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
						<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
							<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
								<img src="<?=url('/storage/app/').'/'.$adv->advertisement_image;?>" alt="<?=$adv->advertisement_name;?>"  title="<?=$adv->advertisement_name;?>"/>
							</a>
						</div>
					</div>
					@endforeach
				@endif
				</div>
				<!--Third news content -->
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="no_padding col-md-6 col-sm-12 col-xs-12">
					@php $cat=$categories->where('category_id',2)->first(); @endphp
						<div class="col-md-12 col-sm-12 col-xs-12">
							<a href="<?=url('/').'/category/'.$cat->category_id."?c=".$cat->category_name;?>">
							<h3 class='content_heading_2'><span><?=$cat->category_name;?></span></h3>
							</a>
						</div>
						@php
							$third_section_news_part1=$allPost->filter(function($post){
								if(strpos($post->post_category_id,'2')>-1){
									return $post;
								} 
							});
							$news=$third_section_news_part1->first();
						@endphp
						<div class="no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="no_padding col-md-7 col-sm-12 col-xs-12">
								
								<div class="col-md-12 col-sm-12 col-xs-12 top_padding">
									<div class="body_same_news_type  no_padding col-md-12 col-sm-12 col-xs-12">
										<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img src="<?=url('/storage/app/').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
										<!-- <p class="slider_time_date_normal"><i class="fa fa-clock-o" aria-hidden="true"></i> ২২:০৭, মে ২৩, ২০১৮</p> -->
										<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
										<p class="post_author_over"><i class="fa fa-user" aria-hidden="true"></i> <?=$news->reporter_name;?></p>
										<p>
											<?=substr(strip_tags($news->post_description),0,850);?>...
											<a class="more" href="<?=url('/').'/news-view/'.$news->post_id.'?n='.$news->post_title;?>">বিস্তারিত</a>
										</p>	
										<div class="news-footer">
											<span><i class='fa fa-eye'></i> <?=$news->news_views;?></span>
											<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">
												<span class="news-cat right"><?=$cat->category_name;?> </span>
											<span class="clear"></span>
											</a>
										</div>								
									</div>
								</div>
							</div>
							<div class="top_padding col-md-5 col-sm-12 col-xs-12">
								@php $newses=$third_section_news_part1->take(5); @endphp
								@foreach($newses as $news)
									<div class="list_news_type col-md-12 col-sm-12 col-xs-12 no_padding">
										<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
									</div>
								@endforeach
							</div>
							<!--<div class="list_news_type col-md-12 col-sm-12 col-xs-12 no_padding">
								<h3><a href="#">জি-মেইল ইয়াহু ব্যবহার করতে পারবেন না সরকারি কর্মচারীরা জি-মেইল ইয়াহু ব্যবহার করতে পারবেন না সরকারি কর্মচারীরা</a></h3>
							</div>-->
						</div>
					</div>	
					<div class="no_padding col-md-6 col-sm-12 col-xs-12">
					@php $cat=$categories->where('category_id',3)->first(); @endphp
						<div class="col-md-12 col-sm-12 col-xs-12">
							<a href="<?=url('/').'/category/'.$cat->category_id."?c=".$cat->category_name;?>">
							<h3 class='content_heading_2'><span><?=$cat->category_name;?></span></h3>
							</a>
						</div>
						@php
							$third_section_news_part2=$allPost->filter(function($post){
								if(strpos($post->post_category_id,'3')>-1){
									return $post;
								} 
							});
							$news=$third_section_news_part2->first();
						@endphp
						<div class="no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="no_padding col-md-7 col-sm-12 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12 top_padding">
									<div class="body_same_news_type  no_padding col-md-12 col-sm-12 col-xs-12">
										<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img src="<?=url('/storage/app/').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
										<!-- <p class="slider_time_date_normal"><i class="fa fa-clock-o" aria-hidden="true"></i> ২২:০৭, মে ২৩, ২০১৮</p> -->
										<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
										<p class="post_author_over"><i class="fa fa-user" aria-hidden="true"></i> <?=$news->reporter_name;?></p>
										<p>
											<?=substr(strip_tags($news->post_description),0,850);?>...
											<a class="more" href="<?=url('/').'/news-view/'.$news->post_id.'?n='.$news->post_title;?>">বিস্তারিত</a>
										</p>	
										<div class="news-footer">
											<span><i class='fa fa-eye'></i> <?=$news->news_views;?></span>
											<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">
												<span class="news-cat right"><?=$cat->category_name;?> </span>
											<span class="clear"></span>
											</a>
										</div>								
									</div>
								</div>
							</div>
							<div class="top_padding col-md-5 col-sm-12 col-xs-12">
								@php $newses=$third_section_news_part2->take(5); @endphp
								@foreach($newses as $news)
									<div class="list_news_type col-md-12 col-sm-12 col-xs-12 no_padding">
										<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
									</div>
								@endforeach
							</div>
							<!--<div class="list_news_type col-md-12 col-sm-12 col-xs-12 no_padding">
								<h3><a href="#">জি-মেইল ইয়াহু ব্যবহার করতে পারবেন না সরকারি কর্মচারীরা জি-মেইল ইয়াহু ব্যবহার করতে পারবেন না সরকারি কর্মচারীরা</a></h3>
							</div>-->
						</div>
					</div>	
				
				</div>

				<!-- add content -->
				<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">			
					@php $advs=$ad->whereIn('advertisement_location',['8','9',10]); @endphp
					@if($advs->count()>0)
					@foreach($advs as $adv)
					<div class="bottom_margin no_padding col-md-4 col-sm-12 col-xs-12">
						<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
							<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
								<img src="<?=url('/storage/app/').'/'.$adv->advertisement_image;?>" alt="<?=$adv->advertisement_name;?>"  title="<?=$adv->advertisement_name;?>"/>
							</a>
						</div>
					</div>
					@endforeach
					@endif
				</div>
				<!-- Fourth news content -->
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					@php $cats=$categories->whereIn('category_id',[4,5,6]); @endphp
					@foreach($cats as $cat)
						@php
						$fourth_section_news=$allPost->filter(function($post) use($cat){
								if(strpos($post->post_category_id,"$cat->category_id")>-1){
									return $post;
								} 
						});
						$news=$fourth_section_news->first();
						@endphp
					<div class="no_padding col-md-4 col-sm-12 col-xs-12">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<a href="<?=url('/').'/category/'.$cat->category_id."?c=".$cat->category_name;?>">
							<h3 class='content_heading_2'><span><?=$cat->category_name;?></span></h3>
							</a>
						</div>
						@if($news)
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="body_same_news_type no_padding col-md-12 col-sm-12 col-xs-12">
								<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img src="<?=url('/storage/app').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
								<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
								<p class="post_author_over"><i class="fa fa-user" aria-hidden="true"></i> <?=$news->reporter_name;?></p>									
							</div>
						</div>
						@endif
						
						<div class="no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<hr>
							</div>
							@php $newses=$fourth_section_news->take(5); @endphp
							@foreach($newses as $news)
							<div class="small_news_type col-md-12 col-sm-6 col-xs-12">
								<div class="no_padding col-md-3 col-sm-4 col-xs-3">
									<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img class="img-thumbnail" src="<?=url('/storage/app').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
								</div>
								
								<div class="no_padding col-md-9 col-sm-8 col-xs-9">
									<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
								</div>
							</div>
							@endforeach
						</div>
						
					</div>
					@endforeach
				</div>
				
				
				<!-- add content -->
			
				<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
					@php $advs=$ad->whereIn('advertisement_location',['11','12','13']); @endphp
					@if($advs->count()>0)
					@foreach($advs as $adv)
					<div class="bottom_margin no_padding col-md-4 col-sm-12 col-xs-12">
						<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
							<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
								<img src="<?=url('/storage/app').'/'.$adv->advertisement_image;?>" alt="<?=$adv->advertisement_name;?>"  title="<?=$adv->advertisement_name;?>"/>
							</a>
						</div>
					</div>
					@endforeach
					@endif
				</div>

				<!-- Fifth news content -->
				
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					@php $cats=$categories->whereIn('category_id',[7,8,10]); @endphp
					@foreach($cats as $cat)
					@php
					$fifth_section_news=$allPost->filter(function($post) use($cat){
							if(strpos($post->post_category_id,"$cat->category_id")>-1){
								return $post;
							} 
					});
					$news=$fifth_section_news->first();
					@endphp
					<div class="no_padding col-md-4 col-sm-12 col-xs-12">
					
						<div class="col-md-12 col-sm-12 col-xs-12">
							<a href="<?=url('/').'/category/'.$cat->category_id."?c=".$cat->category_name;?>">
								<h3 class='content_heading'><span><?=$cat->category_name;?></span></h3>
							</a>
						</div>
						@if($news)
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="body_same_news_type no_padding col-md-12 col-sm-12 col-xs-12">
								<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img src="<?=url('/storage/app/').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
								<!-- <p class="slider_time_date_normal"><i class="fa fa-clock-o" aria-hidden="true"></i> ২২:০৭, মে ২৩, ২০১৮</p> -->
								<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
								<p class="post_author_over"><i class="fa fa-user" aria-hidden="true"></i> <?=$news->reporter_name;?></p>
							</div>
						</div>
						@endif
						<div class="no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<hr>
							</div>
							@php $newses=$fifth_section_news->take(5); @endphp
							@foreach($newses as $news)
							<div class="small_news_type col-md-12 col-sm-6 col-xs-12">
								<div class="no_padding col-md-3 col-sm-4 col-xs-3">
									<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img class="img-thumbnail" src="<?=url('/storage/app').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
								</div>
								
								<div class="no_padding col-md-9 col-sm-8 col-xs-9">
									<h3><a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><?=$news->post_title;?></a></h3>
								</div>
							</div>
							@endforeach
							<!--<div class="small_news_type col-md-12 col-sm-6 col-xs-12">
								<div class="no_padding col-md-3 col-sm-4 col-xs-3">
									<a href="#"><img class="img-thumbnail" src="images/1.jpg" alt="Los Angeles" /></a>
								</div>
								<div class="no_padding col-md-9 col-sm-8 col-xs-9">
									<h3><a href="#">জি-মেইল ইয়াহু ব্যবহার করতে পারবেন না সরকারি কর্মচারীরা জি-মেইল ইয়াহু ব্যবহার করতে পারবেন না সরকারি কর্মচারীরা</a></h3>
								</div>
							</div>-->
						</div>
					</div>
					@endforeach
				</div>
				<!-- add content -->
				<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
					@php $advs=$ad->whereIn('advertisement_location',['14','15','16']); @endphp
					@if($advs->count()>0)
					@foreach($advs as $adv)
					<div class="bottom_margin no_padding col-md-4 col-sm-12 col-xs-12">
						<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
							<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
								<img src="<?=url('/storage/app').'/'.$adv->advertisement_image;?>" alt="<?=$adv->advertisement_name;?>"  title="<?=$adv->advertisement_name;?>"/>
							</a>
						</div>
					</div>
					@endforeach
					@endif
				</div>
			</div>
			<!-- Main Division Ends -->
		</div>
	</div>
</section>