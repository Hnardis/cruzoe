 
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Etape 2 : Modifier un Sample</div>
                <div class="panel-body">

                        <th> <img src="<?php echo e(asset('storage/'. $modif_Sam->sam_cover)); ?>" width="100px" height="50px"> </th>
                    
                    <?php echo Form::open(array('action' => 'AddSampleController@updateSample','enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>

                                        
                        <div class="form-group<?php echo e($errors->has('sam_nom') ? ' has-error' : ''); ?>">
                            <?php echo e(Form::label('sam_nom', 'Titre du Sample ', ['class' => 'col-md-4 control-label'])); ?>

                            <div class="col-md-6">
                                <?php echo e(Form::text ('sam_nom', $modif_Sam->sam_nom, array('class' => 'form-control'))); ?>

                                <span class="help-block">
                                    <strong><?php echo e($errors->first('sam_nom')); ?></strong>
                                </span>
                            </div>
                        </div>      
                        <?php echo e(Form::hidden ('sam_id', $modif_Sam->sam_id, array('class' => 'form-control'))); ?>              
                        
                    
                    <div class="form-group<?php echo e($errors->has('sam_prix') ? ' has-error' : ''); ?>">
                        <?php echo e(Form::label('sam_prix', 'Prix ', ['class' => 'col-md-4 control-label'])); ?>

                        <div class="col-md-6">
                            <?php echo e(Form::number ('sam_prix', $modif_Sam->sam_prix, array('class' => 'form-control'))); ?>

                            <span class="help-block">
                                <strong><?php echo e($errors->first('sam_prix')); ?></strong>
                            </span>
                        </div>
                    </div>    

 <div class="form-group<?php echo e($errors->has('sample') ? ' has-error' : ''); ?>">
                        <?php echo e(Form::label('sample', 'Samples', ['class' => 'col-md-4 control-label'])); ?>

                        <div class="col-md-6">
                            <?php echo Form::file('sample', ['class' => 'form-control-file', 'accept' => '.zip']); ?>

                            <span class="help-block">
                                <strong><?php echo e($errors->first('sample')); ?></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('sam_poche') ? ' has-error' : ''); ?>">
                        <?php echo e(Form::label('sam_poche', 'Modifier la pochette', ['class' => 'col-md-4 control-label'])); ?>

                        <div class="col-md-6">
                            <?php echo Form::file('sam_poche', ['class' => 'form-control-file', 'accept' => 'image/*']); ?>

                            <span class="help-block">
                                <strong><?php echo e($errors->first('sam_poche')); ?></strong>
                            </span>
                        </div>
                    </div>

                    <div class="text-center">
                        <?php echo e(Form::submit('Update', array('class' => 'btn btn-success'))); ?>

                    </div>

                <?php echo Form::close(); ?>

               </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.beats.barre', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>