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
<?php if(in_array('22',$rolls)): ?>
<div class="row-fluid sortable">
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
					<input type="text" class="span6 typeahead" id="typeahead" name='advertisement_name' value="<?php echo e($advertisement->advertisement_name); ?>">
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
				  <?php
				  	$adlocations=DB::table('ad_location')->get();
					$selectedLoacation=$advertisement->advertisement_location;
				  ?>
				  	<select id="advertisement-location" class="form-control" name="advertisement_location">
					<?php $__currentLoopData = $adlocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addlocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $addlocation->location_id==$selectedLoacation?$s="selected":$s=null;?>
						<option <?php echo e(@$s); ?> value="<?php echo e($addlocation->location_id); ?>"><?php echo e($addlocation->location_name); ?></option>
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
				  <button type="submit" class="btn btn-primary">Update Advertisement</button>
				  <button type="reset" class="btn">Reset</button>
				</div>
		  </fieldset>
		</form>
	</div>
</div>
</div>
<?php else: ?>
	<h4>You dont have permission To Edit A Category.Please Contact with Super Admin</h4>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\news\resources\views/admin/advertisement/edit_advertisement.blade.php ENDPATH**/ ?>