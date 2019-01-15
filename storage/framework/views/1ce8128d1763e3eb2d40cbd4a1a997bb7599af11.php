<?php $__env->startSection('title', '| Profil'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-10">
            <h1>Profil</h1> <br> <br>
        </div>
        <div class="col-md-8">
            <?php echo Form::open(array('method'=>'patch', 'route' => ['profil.update', $user->id], 'data-parsley-validate' => '', 'files' => true)); ?>

            <input name="_method" type="hidden" value="PATCH">  
                <?php echo e(csrf_field()); ?>


                <?php echo e(Form::label('photo_profil', 'Photo Profil:')); ?> <br>
                <?php echo e(Html::image("images/profil/$user->photo",'alt',array('width'=>120, 'height'=>120))); ?>  <br>
                <?php echo e(Form::file('upload_img')); ?> <br> <br>

                <?php echo e(Form::label('name','Name:')); ?>

                <?php echo e(Form::text('name', $user->name, array('class'=>'form-control', 'required' => '', 'maxLength' => '255'))); ?>


                <?php echo e(Form::label('email','Email:')); ?>

                <?php echo e(Form::text('email', $user->email, array('class'=>'form-control', 'required' => '', 'maxLength' => '255'))); ?>

                <?php echo e(Form::submit('Update', array('class' => 'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px'))); ?>

            <?php echo Form::close(); ?>


            <?php echo Form::open(array('method'=>'post', 'route'=>'sendPass')); ?>

                <?php echo e(csrf_field()); ?>

                <button type="submit" class="btn btn-primary">
                    <input type="hidden" name="email" value="<?php echo e($user->email); ?>">
                    Send Password Reset Link
                </button>
            <?php echo Form::close(); ?>

        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>