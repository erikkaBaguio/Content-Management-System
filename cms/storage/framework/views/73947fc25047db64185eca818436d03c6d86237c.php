<?php $__env->startSection('content'); ?>

    <h1>ID No. <?php echo e($item->id); ?></h1>
    <h2> <?php echo e($item->name); ?></h2>
    <p class="lead"><?php echo e($item->description); ?></p>

    <?php if ( ! ($item->categories->isEmpty())): ?>
        <h3>Categories :</h3>
        <?php foreach($item->categories as $category): ?>
        <li><?php echo e($category->name); ?></li>
        <?php endforeach; ?>
    <?php endif; ?>

    <a href="<?php echo e(url('items')); ?>" class="btn btn-primary">Back</a>
    <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-warning">Update</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>