<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Metro Admin Template - Metro UI Style Bootstrap Admin Template</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link id="bootstrap-style" href="{{asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/admin/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('public/admin/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('public/admin/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="{{url('admin/show_dashboard')}}"><span>{{$meta->site_title}}</span></a>
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white warning-sign"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have 11 notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New Comment</span>
										<span class="time">1 min</span>
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white tasks"></i>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>You have 17 tasks in progress</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">SEO for new sites</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim greenLight">63</div>
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all tasks</a>
								</li>
							</ul>
						</li>
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white envelope"></i>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Łukasz Holeczek
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>
							</ul>
						</li>
						<!-- end: Message Dropdown -->
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> {{session('admin_name')}}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="{{route('profile')}}"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="{{route('logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
			</div>
		</div>
	</div>
	<!-- start: Header -->
		<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="{{url('admin/show_dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li>
							<a href="{{url('admin/nav')}}">
								<i class="icon-bar-chart"></i>
								<span class="hidden-tablet"> Menu</span>
							</a>
						</li>
						<li><a href="{{url('admin/category')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Category</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Post </span><span class="label label-important"> 3 </span></a>
							<ul>
								<li><a class="submenu" href="{{URL::to('admin/all_posts')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Posts</span></a></li>
								<li><a class="submenu" href="{{URL::to('admin/add_post')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Post</span></a></li>
							</ul>
						</li>
						<li><a href="{{url('admin/reporter')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Reporter</span></a></li>
						<li><a href="{{url('admin/media')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Media</span></a></li>
						<li><a href="{{url('admin/meta')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Meta</span></a></li>
						<li><a href="{{URL::to('admin/user')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Users</span></a></li>
						<li><a href="{{URL::to('admin/advertisement')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Advertisement</span></a></li>
						<li><a href="{{URL::to('admin/roll')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Roll Setting</span></a></li>
						<li><a href="{{URL::to('admin/theme')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Theme Setting</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			<!-- start: Content -->
			<div id="content" class="span10">
				@yield('admin_content')
			</div>
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>
		<div class="clearfix"></div>
		<footer>
			<p>
				<span style="text-align:left;float:left">&copy; 2020 <a href="#" alt="Bootstrap Themes">creativeLabs</a></span>
				<span class="hidden-phone" style="text-align:right;float:right">Powered by:Ecommerce By Alauddin</span>
			</p>
		</footer>
	<!-- start: JavaScript-->
<script src="{{asset('public/admin/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('public/admin/js/jquery-migrate-1.0.0.min.js')}}"></script>
<script src="{{asset('public/admin/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
<script src="{{asset('public/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/admin/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('public/admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/js/jquery.cleditor.min.js')}}"></script>
<script src="{{asset('public/admin/js/custom.js')}}"></script>
<script src="{{asset('public/admin/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/admin/js/shop.js')}}"></script>
	<!-- end: JavaScript-->
<script>
$(document).ready(function(){
	$("#showhide").click(function(){
		$('.showhide').toggle('100');
		text=$(this).html();
		if(text=='Close'){
			txt=$(this).attr('html-text');
			$(this).html(txt);
		}else{
			$(this).html("Close");
		}
	})
	$("#Add_user_type").click(function(){
		var type=$(".userType").val();
		var selectedRull=new Array();
		$("input[name='user_rolls[]']:checked").each(function(){
			selectedRull.push($(this).val());
		})
		if(type==''){
			$("#userType_error").html('Please Type user Type')
		}else if(selectedRull.length<1){
			$("#userType_error").html('Please Select at least one roll')
		}else{
			var app_url="<?= env('app_url')?>";
			$.ajax({
				url:app_url+"admin/save_roll",
				method:'get',
				data:{type:type,selectedRull:selectedRull},
				success:function(result){
					if(result=='success'){
						location.href='';
					}else{
						$("#userType_error").html('Sorry! User Type Not Inserted');
					}
				}
			})
		}
	})
})
</script>
</body>
</html>
