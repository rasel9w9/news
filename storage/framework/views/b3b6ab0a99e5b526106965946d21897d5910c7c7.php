<?php $__env->startSection('admin_content'); ?>
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="<?php echo e(url('admin/show_dashboard')); ?>">Dashboard</a></li>
	</ul>
	<div class="row-fluid">	
		<a class="quick-button metro yellow span2">
			<i class="icon-group"></i>
			<p>Users</p>
			<span class="badge">***</span>
		</a>
		<a class="quick-button metro blue span2" href="<?php echo e(URL('waitting_orders')); ?>">
			<i class="icon-shopping-cart"></i>
			<p>Orders</p>
			<span class="badge">13</span>
		</a>
		<a class="quick-button metro green span2" href="<?php echo e(URL('all_products')); ?>">
			<i class="icon-barcode"></i>
			<p>Products</p>
		</a>
		<a class="quick-button metro pink span2">
			<i class="icon-envelope"></i>
			<p>Messages</p>
			<span class="badge">***</span>
		</a>
		<a class="quick-button metro black span2">
			<i class="icon-calendar"></i>
			<p>Calendar</p>
		</a>
		<div class="clearfix"></div>			
	</div><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\news\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>