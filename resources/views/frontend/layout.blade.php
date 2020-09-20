<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	 <?php 
	    $url= $_SERVER['REQUEST_URI'];
	    $rt = explode("/", $url);
	    if (in_array("news-viewss", $rt)){
	       $title = request()->segments();
	?>
   <meta name="description" content="<?php echo $news_view->seo_description;?>">
	<meta name="keywords" content="<?php echo $news_view->seo_keyword;?>">
	<title><?php echo $news_view->post_title;?></title>
	<meta property="og:url" content="<?=base_url().'news-view/'.$news_view->post_id.'/'.str_replace(' ','-',$news_view->post_title);?>">
	<meta property="og:description" content="<?php echo strip_tags($news_view->post_description);?>">
	<meta property="og:title" content="<?php echo $news_view->post_title;?>">
	<meta property="og:site_name" content="<?= $meta->site_name;?>">
	<!--<meta property="fb:app_id" content="1405933432817561" /> -->
    <meta property="og:type" content="website" /> 
    <meta property="og:image" content="<?php echo base_url().$news_view->post_image;?>">
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="<?php echo $news_view->post_title;?>" />
	<?php }else{?>
	<meta name="description" content="<?= substr(strip_tags($meta->site_description),0,200);?>">
	<!--<meta name="keywords" content="<?= $meta->site_keywords;?>">-->
    <title><?= $meta->site_name;?></title>
	<?php }?>
	<!-- ICON CDN LINK (Please Always Use The Updated CDN) -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Fonts CDN LINK -->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet"> 
	<!-- Bootstrap CSS CDN LINK (Please Always Use The Updated CDN) -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- JQuery CDN LINK (Please Always Use The Updated CDN) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap JS CDN LINK (Please Always Use The Updated CDN) -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Owl Carousel Assets -->
	<link rel="stylesheet" href="{{asset('public/frontend/owlcarousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/owlcarousel/owl.theme.default.min.css')}}">
	<!-- CUSTOM CSS LINK -->
	<link rel="stylesheet" href="{{asset('public/frontend/style.css?updated=2')}}">
	<!-- CUSTOM JQuery & JS -->
	<script src="{{asset('public/frontend/scripts/jquery-ui.js')}}"></script>
	<script src="{{asset('public/frontend/scripts/jquery-ui.min.js')}}"></script>
	<script src="{{asset('public/frontend/scripts/jquery.cycle.all.min.js')}}"></script>
	<script src="{{asset('public/frontend/scripts/jquery.easing.1.3.js')}}"></script>
	<script src="{{asset('public/frontend/owlcarousel/owl.carousel.min.js')}}"></script>
	<script>
	////// Modal Image Script Starts
		$(document).ready(function(){
			var modal = $('#myModal');
			var img = $('.myImg');
			var modalImg = $("#img01");
			
			img.click(function(){
				modalImg.attr("src", this.src);
				modal.show();
			});

			$(".close").click(function(){
				modal.hide();
			});
			
			$('ul.nav li.dropdown').hover(function() {
				$(this).find('.dropdown-menu').stop(true, true).fadeIn('fast');
			}, function() {
				$(this).find('.dropdown-menu').stop(true, true).fadeOut("slow");
			});
		});
	////// Modal Image Script ends
	</script>
	<script>
	$(function() {
		var sticky_navigation_offset_top = $('.navigation').offset().top;
		
		var sticky_navigation = function(){
		
			var scroll_top = $(window).scrollTop()-100;
				 
			if (scroll_top > sticky_navigation_offset_top) { 
				$(".fbPopup").show("slide", { direction: "right" }, 500);
			}else{
				$(".fbPopup").hide("slide", { direction: "right" }, 500);
			}
				
		};
		
		sticky_navigation();
		
		$(window).scroll(function() {
			sticky_navigation();
		});
	});
	</script>
	<style>
		
	</style>
</head>
<body>
	<section class="header">
		<div class="container">
			<div class="row">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<img src="{{url('storage/app/').'/'.$meta->site_logo}}" class="logo" alt="logo" />
						<!--Text or logo both can be used for the site logo, comment the other one if you dont need
						<h1><span style="color:#B30F0F">????????? </span>?????</h1>-->
					</div>
					@php
						$advr=$ad->where('advertisement_location','26')
					@endphp
					<div class="no_padding col-md-5 col-sm-4 hidden-xs">
						@if(count($advr)>0)
						<div style="" class="bottom_margin top_margin no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="middleNewsAdd no_padding col-md-12 col-sm-12 col-xs-12">
								<a class="ads_click_counter" data-ad-id="<?= $advr[0]->advertisement_id;?>" target="_blank" href="<?=$advr[0]->advertisement_url;?>">
									<img src="<?=url('storage/app/'.$advr[0]->advertisement_image);?>" alt="<?=$advr[0]->advertisement_name;?>"  title="<?=$advr[0]->advertisement_name;?>"/>
								</a>
							</div>
						</div>
						@endif
					</div>
					<div class="col-md-3 col-sm-4 col-xs-12">
							<p>
							@php 
							 	function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
            
						            $output = NULL;
						            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
						                $ip = $_SERVER["REMOTE_ADDR"];
						                if ($deep_detect) {
						                    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
						                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
						                    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
						                        $ip = $_SERVER['HTTP_CLIENT_IP'];
						                }
						            }
            
						            $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
						            $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
						            $continents = array(
						                "AF" => "Africa",
						                "AN" => "Antarctica",
						                "AS" => "Asia",
						                "EU" => "Europe",
						                "OC" => "Australia (Oceania)",
						                "NA" => "North America",
						                "SA" => "South America"
						            );
						            if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
						                $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
						                if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
						                    switch ($purpose) {
						                        case "location":
						                            $output = array(
						                                "city"           => @$ipdat->geoplugin_city,
						                                "state"          => @$ipdat->geoplugin_regionName,
						                                "country"        => @$ipdat->geoplugin_countryName,
						                                "country_code"   => @$ipdat->geoplugin_countryCode,
						                                "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
						                                "continent_code" => @$ipdat->geoplugin_continentCode
						                            );
						                            break;
						                        case "address":
						                            $address = array($ipdat->geoplugin_countryName);
						                            if (@strlen($ipdat->geoplugin_regionName) >= 1)
						                                $address[] = $ipdat->geoplugin_regionName;
						                            if (@strlen($ipdat->geoplugin_city) >= 1)
						                                $address[] = $ipdat->geoplugin_city;
						                            $output = implode(", ", array_reverse($address));
						                            break;
						                        case "city":
						                            $output = @$ipdat->geoplugin_city;
						                            break;
						                        case "state":
						                            $output = @$ipdat->geoplugin_regionName;
						                            break;
						                        case "region":
						                            $output = @$ipdat->geoplugin_regionName;
						                            break;
						                        case "country":
						                            $output = @$ipdat->geoplugin_countryName;
						                            break;
						                        case "countrycode":
						                            $output = @$ipdat->geoplugin_countryCode;
						                            break;
						                    }
						                }
						            }
						            return $output;
						        }
        
								function get_client_ip() {
									$ipaddress = '';
									if (isset($_SERVER['HTTP_CLIENT_IP']))
										$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
									else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
										$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
									else if(isset($_SERVER['HTTP_X_FORWARDED']))
										$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
									else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
										$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
									else if(isset($_SERVER['HTTP_FORWARDED']))
										$ipaddress = $_SERVER['HTTP_FORWARDED'];
									else if(isset($_SERVER['REMOTE_ADDR']))
										$ipaddress = $_SERVER['REMOTE_ADDR'];
									else
										$ipaddress = 'UNKNOWN';
									return $ipaddress;
								}
		
								$c_ip = get_client_ip();
								$user_country = ip_info($c_ip, "state");
					//$this->frontend_model->insert_visitor($c_ip,$user_country);
					//echo "country:".$user_country."<br>";
					//echo "ip:".$c_ip."<br>";
								echo 'লক্ষ্মীপুর ';
						    @endphp

    							&nbsp;
    
    					    @php 
						        
								date_default_timezone_set('asia/dhaka');
								
								$currentDate = date("l, j F Y");
								
								$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
								
								$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
								
								$convertedDATE = str_replace($engDATE,$bangDATE,$currentDate);
								
								echo "$convertedDATE";
							@endphp

							&nbsp;

							@php 	
						
								$currentTime = date('h:i', strtotime(date('h:i')));
								$am_pm = date('a', strtotime(date('h:i')));
								if($am_pm == "am"){
									$am_pm = "???";
								}
								if($am_pm == "pm"){
									$am_pm = "????";
								}
								$engTime = array(1,2,3,4,5,6,7,8,9,0);
								$bangTime = array('?','?','?','?','?','?','?','?','?','?');
								$convertedTime = str_replace($engTime,$bangTime,$currentTime);
							//	echo $convertedTime." ".$am_pm;
								
							@endphp
						</p>
						<form action="{{URL('search-news')}}"method="GET">
							<div class="input-group stylish-input-group">
								<input type="text" class="form-control"   placeholder="অনুসন্ধান..." name="s">
								<span class="input-group-addon">
									<button type="submit">
										<span class="glyphicon glyphicon-search"></span>
									</button>  
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="navigation">
		<div class="container">
			<div class="row">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<nav class="navbar">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>                        
								</button>
								<div class="collapse navbar-collapse" id="myNavbar">
									<ul class="nav navbar-nav">
										<li class="active"><a href="{{url('/')}}">প্রচ্ছদ</a></li>
										@php $menus=$categories->where('menu_position',1); @endphp
										@foreach($menus as $menu)
											@if($menu->sub_menu)
												<li class="dropdown">
													<a class="dropdown-toggle" data-toggle="dropdown" href="<?=url('/').'category/'.$menu->category_id."?c=".$menu->category_name;?>"><?=$menu->category_name;?> <span class="caret"></span></a>
													<ul class="dropdown-menu">
													<?php $subs = explode(",",$menu->sub_menu); ?>
													@foreach($subs as $single_subs)
														@php
															$submenu=DB::table('category_table')->where('category_id',$single_subs)->first();
														@endphp
														<li>
															<a href="<?=url('/').'/category/'.$submenu->category_id."?c=".$submenu->category_name;?>"><?=$submenu->category_name?></a>
														</li>
													@endforeach
													</ul>
												</li>
											  @else
												<li><a href="<?=url('/').'/category/'.$menu->category_id."?c=".$menu->category_name;?>"><?= $menu->category_name ?></a></li>
											@endif
										@endforeach
										<div class="clear"></div>
									</ul>
								</div>
							</div>
						</div>
					</nav>
					
				</div>
			</div>
		</div>
	</section>
	<section class="news_scroller">
		<div class="container">
			<div class="news_scroller_content col-md-12 col-sm-12 col-xs-12">
				<div class="no_padding border_r col-md-1 col-sm-2 col-xs-3">
					<p>শিরোনাম</p>
				</div>
				<div class="col-md-11 col-sm-10 col-xs-9">
					<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" attribute_name="attribute_value">
						<ul class="list-inline">
							@foreach($scroll_newses as $scroll_news){?>
								<li>
									<a href="<?=url('/').'news-view/'.$scroll_news->post_id.'/'.str_replace(' ','-',$scroll_news->post_title);?>">
									<i class="fa fa-arrow-circle-o-right"></i>&nbsp;&nbsp; 
									<?=$scroll_news->post_title;?></a> 
								</li>
							@endforeach
						</ul>
					</marquee>
				</div>
			</div>
		</div>
	</section>
	<section class='body'>
		@yield('maincontent')
	</section>
	<section class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding footer-info">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="publish">
								<?= $meta->site_address_1;?>
								
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="download-app">
							<a href="<?=$meta->google_play?>">আমাদের এন্ড্রয়েড এপ্স  
								<img width='50px' src="uploads/android.png">
							</a>
							</div>
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<div class="footer-main-address">
								<?= $meta->site_address_2;?>
							</div>
							<div class="clear"></div>
						</div>
						
					</div>
					
				</div>
				
			</div>
		</div>
	</section>
	<section class="copyright">
		<div class="container">
			<div class="row">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="no_padding col-md-12 col-sm-12 col-xs-12">
						<hr>
					</div>
					<div class="col-md-8 col-sm-6 col-xs-12 no_padding">
						<p> © সর্বস্বত্ব স্বত্বাধিকার সংরক্ষিত ২০১৯ - © <?php date_default_timezone_set("Asia/Dhaka"); echo date('Y');?> <a href="<?= url('/');?>"><?= $meta->site_name;?></a> &nbsp;| &nbsp; Developed By <a href="http://muktodharaltd.com/">MD. ALAUDDIN</a></p>
					</div>

					<div class="socialBottom col-md-4 col-sm-6 col-xs-12 no_padding">
						<a href="<?= $meta->facebook;?>"><span class="face1"><i class="fa fa-facebook"></i></span></a>
						<a href="<?= $meta->twitter;?>"><span class="twit1"><i class="fa fa-twitter"></i></span></a>
						<!-- <a href="#"><span class="feed"><i class="fa fa-feed"></i></span></a> -->
						<a href="<?= $meta->linkedin;?>"><span class="linkedin"><i class="fa fa-linkedin"></i></span></a>
						<a href="<?= $meta->google; ?>"><span class="gol1"><i class="fa fa-google-plus"></i></span></a>
						<a href="<?= $meta->youtube; ?>"><span class="you1"><i class="fa fa-youtube"></i></span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
	<script>
    $(document).ready(function() {
	
		$('.video_slide').owlCarousel({
			loop:true,
			margin:10,
			responsiveClass:true,
			autoplay:true,
			dots:false,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:1,
					nav:true
				},
				1000:{
					items:1,
					nav:true,
					loop:true
				}
			}
		});

		$('.image_slide').owlCarousel({
			loop:true,
			margin:10,
			responsiveClass:true,
			autoplay:true,
			dots:false,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:1,
					nav:true
				},
				1000:{
					items:1,
					nav:true,
					loop:true
				}
			}
		});

		$('.exacusive_slide').owlCarousel({
			loop:true,
			margin:10,
			responsiveClass:true,
			autoplay:true,
			dots:false,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:2,
					nav:true
				},
				1000:{
					items:4,
					nav:true,
					loop:true
				}
			}
		});
     
	});
	function openCity(evt, cityName) {
	
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}
</script>
</html>