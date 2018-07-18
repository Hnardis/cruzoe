<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Page d'acceuil</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
        
                    <ul class="nav navbar-nav">
                       <li><a href="<?php echo e(route('beats.create')); ?>">Ajouter Beats</a></li>
                    </ul>

                    <ul class="nav navbar-nav">
                      <li><a href="<?php echo e(url('#')); ?>">Ajouter Sample</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.beats.barre', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>