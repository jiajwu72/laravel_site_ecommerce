<?php $__env->startSection('stylesheets'); ?>
    <link rel="stylesheet" type="text/css" href="style.scc">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title','| Homepage'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>High Thechnologie</h1>
                <p class="lead">Découcrir les meilleurs high tech produits</p>
                <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
            </div>
        </div>
        <!--end of header .tow-->
    </div>
    <div class="row">
        <div class="col-md-8">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="post">
                <a href="<?php echo e(route('posts.show', $post->id)); ?>"><h3><?php echo e($post->title); ?></h3></a> 
                <p><?php echo e(substr($post->body, 0, 50)); ?> <?php echo e(strlen($post->body) > 50 ? "..." : ""); ?></p>
                
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <hr>
        </div>

<!--
        <div class="col-md-3 col-md-offset-1" ">
            <h2>Promotion</h2>
        </div>
!-->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>