<?php $__env->startSection('title', '| Administration'); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Photo Profil</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Creer Le</th>
                    <th></th>
                </thead>
                <tbody>
                    
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($user->id); ?></th>
                        <td><?php echo e(Html::image("/images/profil/$user->photo", 'alt', array('width'=>40, 'height'=>40))); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->admin == 1 ? "admin" : "membre"); ?></td>
                        <td><?php echo e($user->created_at); ?></td>
                        <?php if($user->admin == 0): ?>
                            <td>
                                <?php echo Form::open(array('route'=>['administration.destroy', $user->id], 'method'=>'DELETE')); ?>

                                    <?php echo Form::submit('Supprimer', ['class' => 'btn btn-danger']); ?>

                                <?php echo Form::close(); ?>

                                
                            </td>
                        <?php endif; ?>    
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
            
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>