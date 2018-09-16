 
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Etape 1 : Listes des samples uploader</div>
                <div class="panel-body">
                        <table class="table table-hover">
                    <tr>
                            <th> Cover </th>
                            <th> titre du Sample</th>
                             <th> Prix</th> 
                             <th> Action</th>
                    </tr>

                    <?php $__currentLoopData = $listSam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listSample): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     
                    <tr>
                            <th> <img src="<?php echo e(asset('storage/'. $listSample->sam_cover)); ?>" width="100px" height="50px"> </th>
                           
                            <th> <?php echo e($listSample->sam_nom); ?> </th> 
                            <th> <?php echo e($listSample->sam_prix); ?> </th> 
                            <th>
                                    <a class= "btn btn-small btn-info"  href="<?php echo e(url('/modifSample/' .$listSample->sam_id)); ?>" > Modifier</a>
                                    <a class= "btn btn-danger"  href="<?php echo e(url('/Effacer/' .$listSample->sam_id)); ?>" > Effacer</a>
                            </th> 
                    
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.beats.barre', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>