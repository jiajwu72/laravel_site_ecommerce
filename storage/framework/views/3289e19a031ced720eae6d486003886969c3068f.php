<?php $__env->startSection('title', '| All Posts'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-10">
            <ol class="breadcrumb">
                <?php if($category_id==0): ?>
                    <li class='active'>Toute</li>
                <?php else: ?>
                    <li><a href="<?php echo e(url('posts?category_id=0')); ?>">Toute</a></li>
                <?php endif; ?>
                
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($category_id == $category->id): ?>
                        <li class='active'><?php echo e($category->name); ?></li>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('posts.index', ['category_id'=>$category->id])); ?>"><?php echo e($category->name); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        </div>
        
        <div class="col-md-2">
            <?php if(Auth::user()->admin == 1): ?>
                <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Deposer Annonce</a>
            <?php endif; ?>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-5">
                        <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-default">
                            <?php echo e(Html::image("images/articles/$post->image", "alt", array('style'=>'margin-top:50px', 'height'=>300, 'width'=>300))); ?>

                        </a>
                        
                        
                            <h3><?php echo e($post->title); ?></h3>  <br>
                            <h4>Prix:<?php echo e($post->price." euros"); ?></h4> 
                        
                    </div> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                

            </div>
        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>