<?php $__env->startSection('content'); ?>

    <h1>ID No. <?php echo e($category->id); ?></h1>
    <h2> <?php echo e($category->name); ?></h2>
    <p class="lead"><?php echo e($category->description); ?></p>

    <a href="<?php echo e(url('categories')); ?>" class="btn btn-primary">Back</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>