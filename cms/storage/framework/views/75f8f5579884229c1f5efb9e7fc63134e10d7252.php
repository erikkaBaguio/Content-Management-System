<?php $__env->startSection('content'); ?>
	<h1>Update Item</h1>
	<div class="col-md-4">
		<?php if(Session::has('flash_message')): ?>
	        <div class="alert alert-success">
	            <?php echo e(Session::get('flash_message')); ?>

	        </div>
	    <?php endif; ?>

		<form method="POST" action="<?php echo e(route('items.update', $item->id)); ?>" >
		<?php echo e(method_field('PUT')); ?>

		<?php echo e(csrf_field()); ?>

		<!-- <input type="hidden" name="method" value="PATCH"> -->
			<div class="form-group">
				Name<input name="name" class="form-control" value="<?php echo e($item->name); ?>" required></input>
			</div>
			<div class="form-group">
                Description<input name="description" class="form-control" value="<?php echo e($item->description); ?>" required></input>
			</div>
            <div class="form-group">
				Unit Cost<input type="number" name="unit_cost" class="form-control" value="<?php echo e($item->unit_cost); ?>" required></input>
			</div>
			<div class="form-group">
				<?php echo Form::label('categories', 'Categories:'); ?>

				<?php echo Form::select('categories[]', $categories, null, ['class'=>'form-control', 'multiple']); ?>

			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>