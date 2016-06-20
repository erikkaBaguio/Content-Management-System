<?php $__env->startSection('content'); ?>
 <center><h1>Simple Content-Management-System</h1>
 <a href="<?php echo e(url('/items/create')); ?>" class="btn btn-success">Create Category</a>
 <hr></center>

 <?php if(Session::has('flash_message')): ?>
     <div class="alert alert-success">
         <?php echo e(Session::get('flash_message')); ?>

     </div>
 <?php endif; ?>

 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>ID</th>
         <th>Name</th>
         <th>Description</th>
         <th>Unit Cost</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     <?php foreach($items as $item): ?>
         <tr>
             <td><?php echo e($item->id); ?></td>
             <td><?php echo e($item->name); ?></td>
             <td><?php echo e($item->description); ?></td>
             <td><?php echo e($item->unit_cost); ?></td>
             <td><a href="<?php echo e(route('items.show', $item->id)); ?>" class="btn btn-primary">Read</a></td>
             <td><a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-warning">Update</a></td>
             <td>
                <form method="POST" action="<?php echo e(route('items.destroy', $item->id)); ?>">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <div class="form-group">
        				<button type="submit" class="btn btn-danger">Delete</button>
        			</div>
                </form>
             </td>
         </tr>
     <?php endforeach; ?>

     </tbody>

 </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>