<?php $__env->startSection('title', '| All Posts'); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $posts = explode(' ', $posts);
        $i=0;
    ?>
    
    <div class="row">
        
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
                        <?php
                            $post = $all->where('id', (int)$post);
                            //dd(' ');
                            $post=$post->toArray();
                            $post=array_pop($post);
                            //dd($post);
                            
                            $img=$post['image'];
                            $price=$post['price'];
                            $id=$post['id'];
                            $title=$post['title'];
                            $i++;
                        ?>
                        <a href="<?php echo e(route('posts.show', $id)); ?>" class="btn btn-default">
                            <?php echo e(Html::image("images/articles/$img", "alt", array('style'=>'margin-top:50px', 'height'=>300, 'width'=>300))); ?>

                        </a>
                        
                        
                            <h3><?php echo e($title); ?></h3>  <br>
                            <h4>Prix:<?php echo e($price." euros"); ?></h4> 
                        
                    </div> 
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                

            </div>
        </div>


    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>