<?php $__env->startSection('title', '| View Post'); ?>

<?php $__env->startSection('content'); ?>
    <div class='row'>
        <div class="col-md-8">
            <h1><?php echo e($post->title); ?></h1>
            <?php echo e(Html::image("/images/articles/$post->image")); ?>

            <?php echo e(Form::label('price', 'Prix(en euro):')); ?>

            <?php echo e($post->price.' euros'); ?>

            <br>
            <?php echo e(Form::label('description', 'Description:')); ?>

            <p class="lead"> <?php echo e($post->body); ?> </p>
            <?php echo e(Form::label('number', 'Quantité:')); ?>

            <?php echo Form::open(array('route'=>'pannier.store', 'method'=>'post')); ?>

                <input type="hidden" name="post_id" value=<?php echo e($post->id); ?>>
                <?php echo e(Form::text('number', 1, array('class' => 'form-control', 'style'=>'width:60px'))); ?>

                <?php echo Form::submit('Valider', array('class' => 'btn btn-primary btn-block')); ?>

            <?php echo Form::close(); ?>

            <h5> Commentaire: </h5>
            <?php 
                $i = 0; 
                //dd($st);
            ?>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-7">
                    <?php 
                    $user=$users->where('id', $comment->user_id);
                    //dd($user);
                    $user=$user->first();
                    $photo = "/images/profil/".$user->photo;
                    ?>
                    
                    <?php echo e(Html::image("$photo", "alt", array('style'=>'border-radius:50%', 'height'=>45, 'width'=>45))); ?>

                    <span style="margin-left:2px"><?php echo e($user->name.' :'); ?></span> 
                    
                    <p class='well'><?php echo e($comment->content); ?></p>
                    
                </div>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br><br>
            <div class="col-md-6">
                <p>Laisser une commentaire:</p>
            </div>
            <?php echo Form::open(array('route'=>'comment.store', 'method'=>'post')); ?>

                <input type="hidden" name="post_id" value=<?php echo e($post->id); ?>>
                <?php echo Form::textarea('write_comment', null, array('class' => 'form-control', 'required' => '', 'minLength' => '10')); ?>

                <?php echo Form::submit('Valider', ['class' => 'btn btn-primary btn-block']); ?>

            <?php echo Form::close(); ?>

        </div>
        
        
        <div class="col-md-4">
            <div class="well well-sm">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd><?php echo e($post->created_at); ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd><?php echo e($post->updated_at); ?></dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' =>
                        'btn btn-primary btn-block')); ?>

                    </div>
                    <div class="col-sm-6">
                        <?php echo Form::open(array('route'=>['posts.destroy', $post->id], 'method'=>'DELETE')); ?>

                                <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-block']); ?>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>