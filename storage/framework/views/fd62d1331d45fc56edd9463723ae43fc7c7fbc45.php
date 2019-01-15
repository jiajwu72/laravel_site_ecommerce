<?php $__env->startSection('title','| Contact'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <h1>Contact me</h1>
            <form action="<?php echo e(url('contact')); ?>" method='post'>
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <!--<label name="message">Message:</label>-->
                    <textarea name="message" id="message" class="message" cols="160" rows="30">Type your messages here....</textarea>
                    <input type="submit" value="send message" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>