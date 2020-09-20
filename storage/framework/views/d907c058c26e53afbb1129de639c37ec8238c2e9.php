<?php $__env->startSection('admin_content'); ?>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i>
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Roll</a>
	</li>
</ul>
<style>
.error{color:maroon;}
</style>
<div class="row-fluid sortable showhide" style='display:none'>
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Add User Type</h2>
		<!--<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>-->
	</div>
	<div class="box-content">
		<!--<form class="form-horizontal for-validation-form"
		action="<?php echo e(URL::to('admin/save_roll')); ?>">-->
		<?php echo csrf_field(); ?>
		  <fieldset>
		  		<div class='error' id='userType_error'></div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">User Type </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead userType"  name='user_type' value="<?= old('user_type')?>" id="" placeholder='Enater User Type'>
				  </div>
				</div>
				<div class="control-group">
					<label class="control-label">Rolls</label>
					<div class="controls">
					<?php $__currentLoopData = $allRolls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <label class="checkbox inline">
						<input type="checkbox" class='user_rolls'  id="inlineCheckbox1" name="user_rolls[]" value="<?php echo e($roll->id); ?>"> <?=$roll->roll_name?>
					  </label>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
				<div class="controls">
				  <button type="submit" id='Add_user_type' class="btn btn-primary">Add</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		<!--</form>-->
	</div>
	</div>
</div>
<div class="row-fluid sortable">
<div class="box span12">
	<button class="btn btn-large btn-primary" id='showhide' html-text="+ Add User Type">+ Add User Type</button>
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Roll</h2>
	</div>
	<div class="box-content">
		<?php if(session('roll_msg')): ?>
		<div class="<?php echo e(session('class')); ?>">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4><strong>Well done!</strong> <?php echo e(session('roll_msg')); ?> </h4>
		</div>
		<?php endif; ?>
		<form class="form-horizontal for-validation-form" action="<?php echo e(URL::to('admin/update_roll')); ?>" method='POST'>
		<?php echo csrf_field(); ?>
		  <fieldset>
				<?php $__currentLoopData = $allTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="control-group">
					<label class="control-label"><?php echo e($type->type); ?></label>
					<div class="controls">
					<?php $__currentLoopData = $allRolls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
						$rolls=explode(',',$type->rolls);
						$type->id==1 ? $dsbld='disabled' : $dsbld=null;
						in_array($roll->id,$rolls) ? $chk="checked" : $chk=null;
					?>
					  <label class="checkbox inline">
						<input type="checkbox" <?=$chk.' '.$dsbld;?>  id="inlineCheckbox1" name="<?php echo e($type->type); ?>_roll[]" value="<?php echo e($roll->id); ?>"> <?=$roll->roll_name?>
					  </label>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<div class="controls">
				  <button type="submit" class="btn btn-primary">Update Roll</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		</form>
	</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\news\resources\views/admin/roll/roll.blade.php ENDPATH**/ ?>