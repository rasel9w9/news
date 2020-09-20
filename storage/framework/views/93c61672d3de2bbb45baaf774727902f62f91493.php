<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8"/>
	<title>Metro Admin Template - Metro UI Style Bootstrap Admin Template</title>
	<meta name="description" content="Metro Admin Template."/>
	<meta name="author" content="Łukasz Holeczek"/>
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link id="bootstrap-style" href="<?php echo e(asset('public/admin/css/bootstrap.min.css')); ?>" rel="stylesheet"/>
	<link href="<?php echo e(asset('public/admin/css/bootstrap-responsive.min.css')); ?>" rel="stylesheet"/>
	<link id="base-style" href="<?php echo e(asset('public/admin/css/style.css')); ?>" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo e(asset('public/admin/css/style-responsive.css')); ?>" rel="stylesheet"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'/>
	<link rel="shortcut icon" href="<?php echo e(asset('public/admin/img/favicon.ico')); ?>"/>
	<style type="text/css">
		body { background: url(<?php echo e(asset('public/admin/img/bg-login.jpg')); ?>) !important; }
	</style>
</head>

<body>
	<div class="container-fluid-full">
		<div class="row-fluid">
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="#"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<h2>Login to your account</h2>
					<?php if(session('msg')): ?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<h4><strong>Sorry!</strong> <?php echo e(session('msg')); ?> </h4>
					</div>
					<?php endif; ?>
					<form class="form-horizontal" action="<?php echo e(route('login')); ?>" method="post">
					<?php echo csrf_field(); ?>
						<div class="input-prepend" title="Username">
							<span class="add-on"><i class="halflings-icon user"></i></span>
							<input class="input-large span10" name="admin_email" id="username" type="text" placeholder="type Admin-Email" value='alauddin@gmail.com'/>
						</div>
						<div class="clearfix"></div>
						<div class="input-prepend" title="Password">
							<span class="add-on"><i class="halflings-icon lock"></i></span>
							<input class="input-large span10" name="admin_password" id="password" type="password" placeholder="type Admin Password" value='a_good_password'/>
						</div>
						<div class="clearfix"></div>
						<div class="button-login">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
						<div class="clearfix"></div>
					</form>
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="#">click here</a> to get a new password.
					</p>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo e(asset('public/admin/js/jquery-1.9.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery-ui-1.10.0.custom.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/modernizr.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.cookie.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/fullcalendar.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/excanvas.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.uniform.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/custom.js')); ?>"></script>
</body>
</html>
<?php /**PATH F:\xampp\htdocs\news\resources\views/admin/login.blade.php ENDPATH**/ ?>