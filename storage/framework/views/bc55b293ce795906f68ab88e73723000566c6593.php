 
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">   Listes des Beats uploaders  </div>
                   <div class="panel-body">

<table class="table table-hover">


<tr>
    <th> Cover </th>
    <th> Nom du fichier</th>
    <th> Duree de l' Extrait</th>
    <th> Actions</th>
    <th> Prix</th>
    <th> Taille</th>
   
    <th> Format</th>
   
    
</tr>

<?php $i = 0; ?>

      <?php $__currentLoopData = $resultBF; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultaBF): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     
<tr>
        <?php if($i == 0)
        {
             ?>
        <th rowspan="4"> <img src="<?php echo e(asset('storage/'.$resultaBF->bea_cheminImage)); ?>" width="100px" height="50px"> </th>
    
        <th rowspan="4"> <?php echo e($resultaBF->bea_nom); ?> </th>

        <th rowspan="4"> <?php echo e($resultaBF->bea_dureeExtrait); ?></th>
        <th rowspan="4"> 
            
            <a class= "btn btn-danger" href="<?php echo e(url('/supprimer/' .$resultaBF->bf_id)); ?>" > Supprimer</a>
       </th> 
        <?php
         } 
        $i++ ; 
        if($i == 4) {
             $i = 0 ;
             } ?> 
        <th> <?php echo e($resultaBF->bf_prix); ?> </th> 
        <th> <?php echo e($resultaBF->bf_taille); ?> </th>
       
        <th> <?php echo e($resultaBF->for_nom); ?></th>
       

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
    </div>
       </div>
          </div>
               </div>
                  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.beats.barre', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>