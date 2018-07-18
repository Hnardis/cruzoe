 
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Etape 2 : Uploader les beats </div>
                <div class="panel-body">
                    <?php echo Form::open(array('action' => 'AjoutController@storeBeatFormat1','enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>


                    <div class="container">
       
       
                 <?php $__currentLoopData = $formats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                               <div class="col-md-4 ">
                                   <?php echo e($f->for_nom); ?>

                                  <?php echo e(Form::hidden('for_id[]', $f->for_id)); ?>

                                  
                               </div>
       
                               <div class="col-md-4 ">
                                       <div class="form-group<?php echo e($errors->has('prix') ? ' has-error' : ''); ?>">
                                                   <?php echo e(Form::number('prix[]', old('prix'), array('class' => 'form-control'))); ?>

                                                   <span class="help-block">
                                                       <strong><?php echo e($errors->first('prix')); ?></strong>
                                                   </span>
                                               </div>
                                </div>
       
                                <div class="col-md-4 ">
                                        <div class="form-group<?php echo e($errors->has('audio') ? ' has-error' : ''); ?>">         
                                                       <?php echo Form::file('audio[]', ['class' => 'form-control-file', 'accept' => 'audio/wav, audio/mpeg']); ?>

                                                       <span class="help-block">
                                                           <strong><?php echo e($errors->first('audio')); ?></strong>
                                                       </span>                                      
                                        </div>
       
                                 </div>
                        </div>
       
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
                    </div> 
       
                               <div class="text-center">
                                   <?php echo e(Form::submit('Uploader et terminer', array('class' => 'btn btn-success'))); ?>

                               </div>
       
                              <?php echo e(Form::hidden('bea_id', $beat->bea_id, array('class' => 'form-control'))); ?>

       
                           <?php echo Form::close(); ?>

                
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.beats.barre', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>