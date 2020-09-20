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
		<!-- Facebook PopUp Starts -->
		<div class="fbPopup hidden-xs">
			<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsylhet%2F&tabs=page&width=320&height=130&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId=1405933432817561" width="320" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		</div>
		<!-- Facebook PopUp Starts -->
		<div class="container">
			<div class="row homePageContent">
			<!-- Main Division Starts -->
				<div class="no_padding col-md-9 col-sm-8 col-xs-12">
					<div class="top_padding col-md-12 col-sm-12 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="#">হোম</a></li>
							<a href="<?=url('/').'/news-view/'.$news_view->post_id.'/'.str_replace(' ','-',$news_view->post_title);?>"><?=$news_view->post_title;?>
							</a>  
						</ol>
					</div>
					<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?= url('/');?>-&layout=button_count&size=large&width=89&height=28&appId" width="89" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
					 <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
					<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Hello%20world" data-size="large">Tweet</a>
					<div class="detailNews col-md-12 col-sm-12 col-xs-12">
						<h2><?=$news_view->post_title;?></h2>
						<p style="color:gray;"><i class="fa fa-user" aria-hidden="true"></i><?=$news_view->reporter_name;?>  &nbsp;&nbsp; | &nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i> 
							<?php 				
								convTime($news_view->post_time);
								echo ", ";
								convDate($news_view->post_date);
							?>
						</p>
						
						<p>
							<img class="img-responsive" src="<?=url('/storage/app').'/'.$news_view->post_image;?>" alt="<?=$news_view->post_title;?>" />
							<?=$news_view->post_description;?>
						</p>
					</div>
					
					<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
						<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
						@php $advs=$ad->whereIn('advertisement_location',[21,22]) @endphp
						@foreach($advs as $adv)
						<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
							<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
								<img src="<?=url('/storage/app/').'/'.$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$adv->advertisement_name;?>"/>
							</a>
						</div>
						@endforeach
						</div>
					</div>
					
					<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
						<div class="categoryNews no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<h3 class="content_heading"><span>রিলেটেড নিউজ</span></h3>
							</div>
							@foreach ($related_newses as $news){
								<div class="col-md-4 col-sm-6 col-xs-12">
									<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img src="<?=url('/storage/app/').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
									<h4> <?=$news->post_title;?></h4>
									<p><b><?=$news->reporter_name;?> :</b> <?=substr(strip_tags($news->post_description),0,260);?>...<a class="more" href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">বিস্তারিত</a></p>
									<br/>
								</div>
							@endforeach
						</div>
					</div>
					
					<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
						<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
							@php $advs=$ad->whereIn('advertisement_location',[23,24]) @endphp
							@foreach($advs as $adv)
							<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
								<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
									<img src="<?=url('storage/app/').$adv->advertisement_image;?>" title="<?=$adv->advertisement_name;?>" class="img-responsive" alt="<?=$adv->advertisement_name;?>"/>
								</a>
							</div>
							@endforeach
						</div>
					</div>
					
				</div>
			<!-- Main Division Ends -->
			<!-- Sidebar Division Start -->
				<div class="all_sidebar no_padding col-md-3 col-sm-4 col-xs-12">
				
					<div style="margin-top:10px;" class="bottom_margin no_padding col-md-12 col-sm-12 col-xs-12">
						<div class="middleNewsAdd no_padding col-md-12 col-sm-12 col-xs-12">
							<img src="images/add2.png" alt="Los Angeles" />
						</div>
					</div>
					
					<div class="no_padding col-md-12 col-sm-12 col-xs-12">
						<h3 class="content_heading"><span>আরও পড়ুন</span></h3>
					</div>
					@foreach($sidebar_newses as $news)
					<div class="categoryNews no_padding col-md-12 col-sm-12 col-xs-12">
						<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img src="<?=url('/storage/app').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">
						<h4> <?=$news->post_title;?></h4>
						</a>
						<p><b><?=$news->reporter_name;?> : </b> <?=substr(strip_tags($news->post_description),0,260);?>...<a class="more" href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">বিস্তারিত</a></p>
						<br>
					</div>
					@endforeach
					<div style="margin-top:10px;" class="bottom_margin no_padding col-md-12 col-sm-12 col-xs-12">
					@php $adv=$ad->where('advertisement_location',19)->first(); @endphp
						<div class="bigNewsAdd no_padding col-md-12 col-sm-12 col-xs-12">
							<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
							<img src="<?=url('/storage/app').'/'.$adv->advertisement_image;?>" title="<?=$adv->advertisement_name;?>" class="img-responsive" alt="<?=$adv->advertisement_name;?>"/>
							</a>
						</div>
					</div>
					<br/>
					<div class="no_padding col-md-12 col-sm-12 col-xs-12">
						<h3 class="content_heading"><span>সর্বশেষ খবর</span></h3>
					</div>
					@foreach($latest_newses as $news)
					<div class="categoryNews no_padding col-md-12 col-sm-12 col-xs-12">
						<a style='color:#000' href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">
						<h4> <?=$news->post_title;?></h4>
						</a>
						<br>
					</div>
					@endforeach
					<br>
					<div style="margin-top:10px;" class="bottom_margin no_padding col-md-12 col-sm-12 col-xs-12">
					@php $adv=$ad->where('advertisement_location',20)->first(); @endphp
						<div class="bigNewsAdd no_padding col-md-12 col-sm-12 col-xs-12">
							<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
							<img src="<?=url('/storage/app').'/'.$adv->advertisement_image;?>" title="<?=$adv->advertisement_name;?>" class="img-responsive" alt="<?=$adv->advertisement_name;?>"/>
							</a>
						</div>
					</div>
				</div>
			<!-- Sidebar Division Ends -->
			</div>
		</div>
	</section>