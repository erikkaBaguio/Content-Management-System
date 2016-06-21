<?php $__env->startSection('content'); ?>
	<h1>Create category</h1>
	<div class="col-md-4">
		<?php if(Session::has('flash_message')): ?>
	        <div class="alert alert-success">
	            <?php echo e(Session::get('flash_message')); ?>

	        </div>
	    <?php endif; ?>

		<form method="POST" action="<?php echo e(url('categories')); ?>">
		<?php echo e(csrf_field()); ?>

		<input type="hidden" name="method" value="PATCH">
			<div class="form-group">
				Name<input name="name" class="form-control"></input>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</form>

		<?php if($errors): ?>
			<div class="alert alert-danger">
				<?php foreach($errors->all() as $error): ?>
					<li> <?php echo e($error); ?> </li>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>