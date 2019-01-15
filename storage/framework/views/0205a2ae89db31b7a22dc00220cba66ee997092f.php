<?php $__env->startSection('title', '| Edit Post'); ?>

<?php $__env->startSection('stylesheets'); ?>
    <?php echo Html::style('css/parsley.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::model($post, array('route' => ['posts.update', $post->id], 'method'=>'put', 'data-parsley-validate' => '', 'files' => true)); ?>

    <?php echo e(csrf_field()); ?>

    <div class='row'>
        <div class="col-md-8">
            <?php echo Form::label('title', 'Title:'); ?>

            <?php echo Form::text('title', null, array('class' => 'form-control', 'required' => '')); ?>

            <hr>
            <?php echo e(Html::image("/images/articles/$post->image")); ?>

            <?php echo e(Form::label('upload_img', 'Upload Image:')); ?>

            <?php echo e(Form::file('upload_img')); ?>

            <?php echo Form::label('body', 'Body:'); ?>

            <?php echo Form::textarea('body', null, ["class" => 'form-control', 'required' => '']); ?>

            <select name="category" class='form-control'>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($event->id); ?>"><?php echo e($event->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
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
                        <input type="submit" value="save" class="btn btn-block btn-success">
                    </div>
                    <div class="col-sm-6">
                        <?php echo Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' =>
                        'btn btn-danger btn-block')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>