<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CMS</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo e(url('items')); ?>" >Items</a>
      <a class="navbar-brand" href="<?php echo e(url('categories')); ?>" >Categories</a>
    </div>
  </div>
</nav>

<main>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

</body>
</html>
