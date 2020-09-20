<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
    <meta name="author" content="Muktodhara Tech Ltd.">
    <meta name="description" content="description">
	<meta name="keywords" content="Site Keywords">
	
	<!-- Site ICON LINK -->	
    <link rel="icon" href="images/4.jpg">	
	
    <title>Chattogram Sangbad</title>
    
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
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="owl-carousel/owl.transitions.css" rel="stylesheet">
	
	<!-- CUSTOM CSS LINK -->
	<link rel="stylesheet" href="style.css">
	
	
	<!-- CUSTOM JQuery & JS -->
	
	<script src="scripts/jquery-ui.js"></script>
	<script src="scripts/jquery-ui.min.js"></script>
	<script src="scripts/jquery.cycle.all.min.js"></script>
	<script src="scripts/jquery.easing.1.3.js"></script>
	
	<script src="owl-carousel/owl.carousel.js"></script>
	
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

	
	
	
	<!-- Meta Tags For Facebook Share -->
	<!-- 
	<meta property="og:url" content="{{pageUrl}}">
	<meta property="og:image" content="{{imageUrl}}">
	<meta property="og:description" content="{{description}}">
	<meta property="og:title" content="{{pageTitle}}">
	<meta property="og:site_name" content="{{siteTitle}}">
	<meta property="og:see_also" content="{{homepageUrl}}"> 
	-->
	
	<!-- Meta Tags For Google Share -->
	<!-- 
	<meta itemprop="name" content="{{pageTitle}}">
	<meta itemprop="description" content="{{description}}">
	<meta itemprop="image" content="{{imageUrl}}">
	-->
	
	<!-- Meta Tags For Twitter Share -->
	<!-- 
	<meta name="twitter:card" content="summary">
	<meta name="twitter:url" content="{{pageUrl}}">
	<meta name="twitter:title" content="{{pageTitle}}">
	<meta name="twitter:description" content="{{description}}">
	<meta name="twitter:image" content="{{imageUrl}}">
	-->
	
</head>

<body>

	<!--<section class="top">
		<div class="container">
			<div class="row">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="no-padding col-md-1 col-xs-4">
						 <p>শিরোনাম</p>
					</div>
					<div class="col-md-11 col-xs-8">
						<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" attribute_name="attribute_value">
							<p>
								<ul class="list-inline">
									<li><i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; <a href="#">নদীতে সাঁতারে নেমে যুবকের মৃত্যু</a> 
									</li>
								</ul>
							</p>
						</marquee>
					</div>
					
				</div>
			</div>
		</div>
	</section>-->
	
	<section class="header">
		<div class="container">
			<div class="row">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-4 col-sm-4 col-xs-12">
						
						
						<img src="images/logo.png" class="logo" alt="logo" />
						
						<!--Text or logo both can be used for the site logo, comment the other one if you dont need
						<h1><span style="color:#B30F0F">চট্টগ্রাম </span>সংবাদ</h1>-->
					</div>
					
					<div class="no_padding col-md-5 col-sm-4 col-xs-12">
						<div style="" class="bottom_margin top_margin no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="middleNewsAdd no_padding col-md-12 col-sm-12 col-xs-12">
								<img src="images/add2.png" alt="Los Angeles" />
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-4 col-xs-12">
						<p>আজ মঙ্গলবার, ২২ মে ২০১৮ ইং</p>
						<div class="input-group stylish-input-group">
							<input type="text" class="form-control"  placeholder="অনুসন্ধান..." >
							<span class="input-group-addon">
								<button type="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>  
							</span>
						</div>
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
										<li class="active"><a href="#">প্রচ্ছদ</a></li>
										<li><a href="#">জাতীয়</a></li>
										<li><a href="#">রাজনীতি</a></li>
										<li><a href="#">অর্থনীতি</a></li>
										<li><a href="#">আন্তর্জাতিক</a></li>
										<li><a href="#">খেলাধুলা</a></li>
										<li><a href="#">ঢাকা শহর</a></li>
										<li><a href="#">আমাদের শহর</a></li>
										<li><a href="#">অপরাধ</a></li>
										<li><a href="#">বিনোদন</a></li>
										<li><a href="#">সারাদেশ</a></li>
										<li><a href="#">আইন-আদালত</a></li>
										<li><a href="#">শিক্ষা</a></li>
										<li><a href="#">প্রবাস</a></li>
										<li><a href="#">জনদূর্ভোগ </a></li>
										<li><a href="#">শিল্প ও সাহিত্য</a></li>
										<li><a href="#">পুজিবাজার</a></li>
										<li><a href="#">চাকুরী</a></li>
										<li><a href="#">উপজেলা</a></li>
										<li class="dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#">অন্যান্য <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#">অন্যান্য 1</a></li>
												<li><a href="#">অন্যান্য 2</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</nav>
					
				</div>
			</div>
		</div>
	</section>
	
	
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
							<li><a href="#">চাকুরী</a></li>    
						</ol>
					
					</div>
				
					<div class="detailNews col-md-12 col-sm-12 col-xs-12">
					
						<h2>বাংলাদেশের প্রযুক্তি খাতে রাশিয়ার ১০০ মিলিয়ন ডলার বিনিয়োগ</h2>
						<p style="color:gray;"><i class="fa fa-user" aria-hidden="true"></i> প্রতিবেদক &nbsp;&nbsp; | &nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i> ২২:০৭, মে ২৩, ২০১৮</p>
						
						<p>
							<img src="images/1.jpg" alt="image" />
							রিয়াদকে লক্ষ্য করে ছোঁড়া হুতিদের একটি ক্ষেপণাস্ত্র ধ্বংস করেছে সৌদি আরব। বুধবার দেশটির সরকারি বার্তা সংস্থার বরাত দিয়ে রয়টার্স এ তথ্য জানিয়েছে।

							এতে বলা হয়েছে, কমপক্ষে তিনটি বিস্ফোরণের শব্দ শোনা গেছে। রাজধানী রিয়াদের আকাশে তিনটি ধোঁয়ার মেঘ দেখা গেছে।

							ইয়েমেনের হুতিরা জানিয়েছে, সৌদি নেতৃত্বাধীন জোট ইয়েমেনের ওপর যে বিমান হামলা চালিয়ে যাচ্ছে তার জবাবেই পাল্টা এই হামলা চালানো হয়েছে। এর আগে গত মাসেও হুতিরা রিয়াদকে লক্ষ্য করে ক্ষেপণাস্ত্র ছুঁড়েছিল। ওই সময় রিয়াদের আকাশ প্রতিরক্ষা ব্যবস্থার মাধ্যমে এটি ধ্বংস করা হয়। ক্ষেপণাস্ত্রের ধ্বংসাবেশেষ ওপরে পরে এক সৌদি নাগরিক ওই সময় নিহত হয়।

							গত পাঁচ মাসে সৌদি আরবে এই নিয়ে পাঁচবার হামলা চালালো হুতিরা। ইয়েমেনও যে সৌদির বিরুদ্ধে পাল্টা হামলা চালানোর সক্ষমতা অর্জন করেছে তা দেখাতেই এই হামলা চালাচ্ছে হুতিরা। সৌদি আরবের দাবি ইরানই, আঞ্চলিক প্রাধান্য বিস্তারে হুতিদের ক্ষেপণাস্ত্র সরবরাহ করছে। তবে তেহরান এই অভিযোগ অস্বীকার করে আসছে।
							
							আন্তর্জাতিক ডেস্ক :
							রিয়াদকে লক্ষ্য করে ছোঁড়া হুতিদের একটি ক্ষেপণাস্ত্র ধ্বংস করেছে সৌদি আরব। বুধবার দেশটির সরকারি বার্তা সংস্থার বরাত দিয়ে রয়টার্স এ তথ্য জানিয়েছে।

							এতে বলা হয়েছে, কমপক্ষে তিনটি বিস্ফোরণের শব্দ শোনা গেছে। রাজধানী রিয়াদের আকাশে তিনটি ধোঁয়ার মেঘ দেখা গেছে।

							ইয়েমেনের হুতিরা জানিয়েছে, সৌদি নেতৃত্বাধীন জোট ইয়েমেনের ওপর যে বিমান হামলা চালিয়ে যাচ্ছে তার জবাবেই পাল্টা এই হামলা চালানো হয়েছে। এর আগে গত মাসেও হুতিরা রিয়াদকে লক্ষ্য করে ক্ষেপণাস্ত্র ছুঁড়েছিল। ওই সময় রিয়াদের আকাশ প্রতিরক্ষা ব্যবস্থার মাধ্যমে এটি ধ্বংস করা হয়। ক্ষেপণাস্ত্রের ধ্বংসাবেশেষ ওপরে পরে এক সৌদি নাগরিক ওই সময় নিহত হয়।

							গত পাঁচ মাসে সৌদি আরবে এই নিয়ে পাঁচবার হামলা চালালো হুতিরা। ইয়েমেনও যে সৌদির বিরুদ্ধে পাল্টা হামলা চালানোর সক্ষমতা অর্জন করেছে তা দেখাতেই এই হামলা চালাচ্ছে হুতিরা। সৌদি আরবের দাবি ইরানই, আঞ্চলিক প্রাধান্য বিস্তারে হুতিদের ক্ষেপণাস্ত্র সরবরাহ করছে। তবে তেহরান এই অভিযোগ অস্বীকার করে আসছে।
						</p>
					</div>
					
					<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
						<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
							<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
								<img src="images/add1.jpg" alt="Los Angeles" />
							</div>
						</div>
						<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
							<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
								<img src="images/add2.png" alt="Los Angeles" />
							</div>
						</div>
					</div>
					
					<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
						<div class="categoryNews no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<h3 class="content_heading"><span>রিটেলেড নিউজ</span></h3>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/7.jpg" alt="Los Angeles" />
								<h4> বিমান এই প্রথম রোববার ১ ঘণ্টার উড্ডয়ন সফলভাবে সম্পন্ন করেছে সম্পন্ন করেছে সম্পন্ন করেছে</h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/10.jpg" alt="Los Angeles" />
								<h4> বিমান এই প্রথম রোববার ১ ঘণ্টার উড্ডয়ন সফলভাবে সম্পন্ন করেছে</h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/12.jpg" alt="Los Angeles" />
								<h4>সম্পন্ন করেছে বিমান এই প্রথম রোববার </h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/12.jpg" alt="Los Angeles" />
								<h4>সম্পন্ন করেছে বিমান এই প্রথম রোববার </h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/1.jpg" alt="Los Angeles" />
								<h4> বিমান এই প্রথম রোববার ১ ঘণ্টার উড্ডয়ন সফলভাবে সম্পন্ন করেছে</h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/19.jpg" alt="Los Angeles" />
								<h4>সম্পন্ন করেছে বিমান এই প্রথম রোববার </h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/8.jpg" alt="Los Angeles" />
								<h4> বিমান এই প্রথম রোববার ১ ঘণ্টার উড্ডয়ন সফলভাবে সম্পন্ন করেছে সম্পন্ন করেছে সম্পন্ন করেছে</h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/9.jpg" alt="Los Angeles" />
								<h4> বিমান এই প্রথম রোববার ১ ঘণ্টার উড্ডয়ন সফলভাবে সম্পন্ন করেছে</h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/16.jpg" alt="Los Angeles" />
								<h4>সম্পন্ন করেছে বিমান এই প্রথম রোববার </h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/17.jpg" alt="Los Angeles" />
								<h4> বিমান এই প্রথম রোববার ১ ঘণ্টার উড্ডয়ন সফলভাবে সম্পন্ন করেছে</h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/18.jpg" alt="Los Angeles" />
								<h4>সম্পন্ন করেছে বিমান এই প্রথম রোববার </h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<img src="images/2.jpg" alt="Los Angeles" />
								<h4> বিমান এই প্রথম রোববার ১ ঘণ্টার উড্ডয়ন সফলভাবে সম্পন্ন করেছে সম্পন্ন করেছে সম্পন্ন করেছে</h4>
								<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
								<br>
							</div>
						</div>
					</div>
					
					
					<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
						<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
							<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
								<img src="images/add1.jpg" alt="Los Angeles" />
							</div>
						</div>
						<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
							<div class="middleNewsAdd col-md-12 col-sm-12 col-xs-12">
								<img src="images/add2.png" alt="Los Angeles" />
							</div>
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
					
					
					<div class="categoryNews no_padding col-md-12 col-sm-12 col-xs-12">
						<img src="images/2.jpg" alt="Los Angeles" />
						<h4> বিমান এই প্রথম রোববার ১ ঘণ্টার উড্ডয়ন সফলভাবে সম্পন্ন করেছে সম্পন্ন করেছে সম্পন্ন করেছে</h4>
						<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
						<br>
					</div>
					
					<div class="categoryNews no_padding col-md-12 col-sm-12 col-xs-12">
						<img src="images/2.jpg" alt="Los Angeles" />
						<h4> বিমান এই প্রথম রোববার ১ ঘণ্টার উড্ডয়ন সফলভাবে সম্পন্ন করেছে সম্পন্ন করেছে সম্পন্ন করেছে</h4>
						<p><b>নিজস্ব প্রতিবেদকঃ</b> জাতীয় নিরাপত্তা পরিষদ ও পররাষ্ট্রনীতি বিষয়ক কমিটির লোকজনের পদত্যাগে যখন...<a class="more" href="">বিস্তারিত</a></p>
						<br>
					</div>
					
				</div>
				
			<!-- Sidebar Division Ends -->
			</div>
		</div>
	</section>
	
	<section class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<h3>যোগাযোগ</h3>
					
					<p>৪৪, ইস্কাটন গার্ডেন, রমনা</p>
					<p>চৌধুরী পাড়া, চট্টগ্রাম ।</p>
					<p>ফোন : +৮৮ ০১৭১ ২৩৪ ৫৬৭ ৮, +৯৯ ০১৮১ ২৩৪ ৫৬৭ ৮</p>
					<p>ফ্যাক্স : +৮৮-০২-৮৩১৮০৪৩</p>
					<p>ইমেইল : chattogramsangbad@gmail.com</p>
					<p>নিউজের জন্য: dhakatimes24@yahoo.com</p>
					
					<div class="socialBottom col-md-12 col-sm-12 col-xs-12">						
						<a href="#"><span class="face1"><i class="fa fa-facebook"></i></span></a>
						<a href="#"><span class="twit1"><i class="fa fa-twitter"></i></span></a>
						<a href="#"><span class="gol1"><i class="fa fa-google-plus"></i></span></a>
						<a href="#"><span class="you1"><i class="fa fa-youtube"></i></span></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<h3>সম্পাদক ও প্রকাশক</h3>
					<p>চট্টগ্রাম সংবাদ</p>
					<h3>সহ-সম্পাদক</h3>
					<p>চট্টগ্রাম সংবাদ</p>
				</div>
				<div class="site_name_app top_padding col-md-4 col-sm-4 col-xs-12">
					<div class="no_padding col-md-12 col-sm-12 col-xs-12">
						<h2><a href="#">চট্টগ্রাম সংবাদ</a></h2>
						<hr>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<a href="#"><img src="images/andapp.png" alt="image" /></a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<a href="#"><img src="images/iapp.png" alt="image" /></a>
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
					<p class="center"> © সর্বস্বত্ব স্বত্বাধিকার সংরক্ষিত ২০১২ - ২০১৮ <a href="#">chattogramsangbad.com</a> &nbsp;&nbsp;| &nbsp;&nbsp;এই ওয়েবসাইটের কোনো লেখা, ছবি, ভিডিও অনুমতি ছাড়া ব্যবহার সম্পূর্ণ বেআইনি এবং শাস্তিযোগ্য অপরাধ</p>
					<p class="center">Developed By <a href="http://muktodharaltd.com/">Muktodhara Technology Limited</a></p>
				</div>
			</div>
		</div>
	</section>
</body>

	
	<script>
    $(document).ready(function() {
	
		var owl = $("#owl-demo");
		
		owl.owlCarousel({
			singleItem : true,
			autoPlay: true,
			stopOnHover : true,
			slideSpeed: 250,
			mouseDrag: true,
			paginationSpeed: 300,
			transitionStyle : "fade",
			pagination : false,
			// Responsive 
			responsive: true,
			responsiveRefreshRate : 200,
			responsiveBaseWidth: window,
			// Navigation
			navigation:true,
			navigationText: ["<i class='home_slider_l fa fa-chevron-left'></i>","<i class='fa fa-chevron-right home_slider_r'></i>"],   
		});
     
	});
</script>
	

</html>