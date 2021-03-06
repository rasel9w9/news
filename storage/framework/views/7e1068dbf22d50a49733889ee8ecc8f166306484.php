<?php $__env->startSection('admin_content'); ?>
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
<style> .error{color:maroon;} </style>
<div class="row-fluid sortable showhide" style='display:none'>
<?php if(in_array('21',$rolls)): ?>
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Advertisement</h2>
	</div>
	<div class="box-content">
		<form class="form-horizontal for-validation-form" action="<?php echo e(URL::to('admin/save_advertisement')); ?>" method='post' enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
		  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Advertisement Name </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" id="typeahead" name='advertisement_name' value="<?=old('advertisement_name')?>">
				  </div>
				  <div class='controls error'><?php $__errorArgs = ['advertisement_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Advertisement Location </label>
				  <div class="controls">
				  	<select id="advertisement-location" class="form-control" name="advertisement_location">
					<?php $__currentLoopData = $adlocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addlocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($addlocation->location_id); ?>"><?php echo e($addlocation->location_name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				  </div>
				  <div class='controls'><?php $__errorArgs = ['advertisement_location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
				</div>
				<div class="control-group">
					<label class="control-label" for="fileInput">Advertiement Image</label>
					<div class="controls">
						<input class="input-file uniform_on" id="fileInput" type="file" name='advertisement_image' placeholder='Advertisement Image'>
					</div>
					<div class='controls error'><?php $__errorArgs = ['advertisement_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Advertisement URL </label>
				  <div class="controls">
					<input type="url" class="span6 typeahead" name='advertisement_url' value="<?=old('advertisement_url')?>">
				  </div>
				  <div class='controls error'><?php $__errorArgs = ['advertisement_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Publication Status</label>
				  <div class="controls">
					<input type='checkbox' name='advertisement_status' value='1'/>
				  </div>
				  <div class='controls error'><?php $__errorArgs = ['advertisement_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">End Date</label>
				  <div class="controls">
					<input type='date' name='end_at' value="<?=old('end_at')?>"/>
				  </div>
				  <div class='controls error'><?php $__errorArgs = ['end_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Advertisement</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		</form>
	</div>
</div>
<?php else: ?>
	<h4>You dont have permission To Add Advertisement.Please Contact with Super Admin</h4>
<?php endif; ?>
</div>
<?php if(session('adv_msg')): ?>
<div class="<?php echo e(session('class')); ?>">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4><strong>Well done!</strong> <?php echo e(session('adv_msg')); ?> </h4>
</div>
<?php endif; ?>
<div class='row-fluid sortable'>
	<div class='box span12'>
		<button class="btn btn-large btn-primary" id='showhide' html-text="+ Add Advertisement">+ Add Advertisement</button>
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>All Advertisements</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<!--<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>-->
			</div>
		</div>
		<div class='box-content'>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th width='5%'>ID</th>
					  <th>Name</th>
					  <th>Image</th>
					  <th>Url</th>
					  <th>Location</th>
					  <th>Status</th>
					  <th>End Date</th>
					  <th>Action</th>
				  </tr>
			  </thead>
			  <tbody>
			  <?php $__currentLoopData = $allAdvertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td class="center"><?=$advertisement->advertisement_id?></td>
					<td class="center"><?=$advertisement->advertisement_name?></td>
					<td class="center">
						<img src="<?php echo e(url('storage/app/'.$advertisement->advertisement_image)); ?>" width="75px" height="75px">
					</td>
					<td class="center"><?=$advertisement->advertisement_url?></td>
					<td class="center"><?=$advertisement->advertisement_location?></td>
					<td class="center">
						<?php if($advertisement->advertisement_status==0): ?>
						<span class="label label-important"><?php echo e("Inactive"); ?></span>
						<?php else: ?>
						<span class="label green"><?php echo e("Active"); ?></span>
						<?php endif; ?>
					</td>
					<td class="center">
					<?php echo date('d-M-Y',strtotime($advertisement->end_at));?>
					</td>
					<td class="center">
					<?php if(in_array('22',$rolls)): ?>
						<?php if($advertisement->advertisement_status==0): ?>
						<a class="btn btn-success" href="<?php echo e(route('adStatus',[$advertisement->advertisement_id,1])); ?>">
							<i class="halflings-icon white thumbs-up"></i>
						</a>
						<?php else: ?>
							<a class="btn btn-danger" href="<?php echo e(route('adStatus',[$advertisement->advertisement_id,0])); ?>">
								<i class="halflings-icon white thumbs-down"></i>
							</a>
						<?php endif; ?>
						<?php if(in_array('22',$rolls)): ?>
							<a class="btn btn-info" href="<?php echo e(URL::to('admin/edit_advertisement/'.$advertisement->advertisement_id)); ?>">
								<i class="halflings-icon white edit"></i>
							</a>
						<?php endif; ?>
						<?php if(in_array('23',$rolls)): ?>
							<a class="btn btn-danger" href="<?php echo e(URL::to('admin/delete_advertisement/'.$advertisement->advertisement_id)); ?>">
								<i class="halflings-icon white trash"></i>
							</a>
						<?php endif; ?>
					<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </tbody>
		  </table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\news\resources\views/admin/advertisement/add_advertisement.blade.php ENDPATH**/ ?>