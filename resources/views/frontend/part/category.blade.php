<section class="body">
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
				<div class="categoryNews top_padding no_padding col-md-12 col-sm-12 col-xs-12">
				
					<div class="no_padding col-md-12 col-sm-12 col-xs-12">
						@if($allNewsByCategory->count()>0)
						@foreach($allNewsByCategory as $news)
						<div class="col-md-4 col-sm-6 col-xs-12">
							<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img src="<?=url('/storage/app').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">
								<h4> <?=$news->post_title;?></h4>
							</a>
							<p><b><?=$news->reporter_name;?> :</b> <?=substr(strip_tags($news->post_description),0,260);?>...<a class="more" href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">বিস্তারিত</a></p>
							<br>
						</div>
						@endforeach
						@else
						<h2 class="text-center">Nothing Found.</h2>
						@endif
					</div>
				</div>
				<div class="top_margin col-md-12 col-sm-12 col-xs-12">
					<br/>
					<?=$allNewsByCategory->links();?> 
					<br/>
				</div>
				<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
						@php $advs = $ad->whereIn('advertisement_location',[16,17]); @endphp
						@foreach($advs as $adv)
						<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
							<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
								<img src="<?=url('/storage/app').$ad->advertisement_image;?>" title="<?=$adv->advertisement_name;?>" class="img-responsive" alt="<?=$adv->advertisement_name;?>"/>
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
					<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>"><img src="<?=url('storage/app').'/'.$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
					<a href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">
					<h4> <?=$news->post_title;?></h4>
					</a>
					<p><b><?=$news->reporter_name;?> : </b> <?=substr(strip_tags($news->post_description),0,260);?>...<a class="more" href="<?=url('/').'/news-view/'.$news->post_id.'/'.str_replace(' ','-',$news->post_title);?>">বিস্তারিত</a></p>
					<br>
				</div>
				@endforeach
				@php $adv = $ad->where('advertisement_location',18)->first(); @endphp
				@if($adv)
				<div style="margin-top:10px;" class="bottom_margin no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="bigNewsAdd no_padding col-md-12 col-sm-12 col-xs-12">
						<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
							<img src="<?=url('/storage/app/').$adv->advertisement_image;?>" title="<?=$adv->advertisement_name;?>" class="img-responsive" alt="<?=$adv->advertisement_name;?>"/>
						</a>
					</div>
				</div>
				@endif
				<div class="col-md-12 col-sm-12 col-xs-12 no_padding left_sidenav">
				   <h4 data-toggle="collapse" href="#collapse_price">সকল ক্যাটেগরি খবর</h4>
					<div id="collapse_price" class="collapse in list_item">
						@php $menus=$categories->where('menu_position',1); @endphp
						@foreach($menus as $menu)
						<p>
							<a href="<?=url('/').'/category/'.$menu->category_id."?c=".$menu->category_name;?>">
								<?=$menu->category_name;?>
							</a>
						</p>
						@endforeach
					</div>   
				</div>
				@php $adv = $ad->where('advertisement_location',19)->first(); @endphp
				@if($adv)
				<div style="margin-top:10px;" class="bottom_margin no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="bigNewsAdd no_padding col-md-12 col-sm-12 col-xs-12">
						<a class="ads_click_counter" data-ad-id="<?= $adv->advertisement_id;?>" target="_blank" href="<?=$adv->advertisement_url;?>">
							<img src="<?=url('/storage/app/').$adv->advertisement_image;?>" title="<?=$adv->advertisement_name;?>" class="img-responsive" alt="<?=$adv->advertisement_name;?>"/>
						</a>
					</div>
				</div>
				@endif
			</div>
		<!-- Sidebar Division Ends -->
		</div>
	</div>
</section>