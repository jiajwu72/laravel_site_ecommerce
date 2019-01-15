<?php $__env->startSection('title', '| Create New Post'); ?>

<?php $__env->startSection('stylesheets'); ?>
    <?php echo Html::style('css/parsley.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            
            <?php echo Form::open(array('method'=>'post', 'route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)); ?>

                <?php echo e(csrf_field()); ?>

                <?php echo e(Form::label('title', 'Title:')); ?>

                <?php echo e(Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxLength' => '255'))); ?>


                <?php echo e(Form::label('upload_img', 'Upload Image:')); ?>

                <?php echo e(Form::file('upload_img')); ?>

                <?php echo e(Form::label('price', "price:(Euro)")); ?>

                <?php echo e(Form::text('price', null, array('class' => 'form-control', 'required' => '', 'maxLength' => '10'))); ?>

                <?php echo e(Form::label('body', "Description:")); ?>

                <?php echo e(Form::textarea('body', null, array('class' => 'form-control', 'required' => '', 'minLength' => '10'))); ?>


                <?php echo e(Form::label('category', "Category:")); ?>

                <select name="category" class='form-control'>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <option value="<?php echo e($event->id); ?>"><?php echo e($event->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <?php echo e(Form::submit('Publish', array('class' => 'btn btn-success btn-lg btn-block'))); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo Html::script('js/parsley.min.js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>