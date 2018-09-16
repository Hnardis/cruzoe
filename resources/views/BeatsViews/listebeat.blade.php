@extends('layouts.beats.barre') 
@section('content')

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

      @foreach($resultBF as $resultaBF )
     
<tr>
        <?php if($i == 0)
        {
             ?>
        <th rowspan="4"> <img src="{{ asset('storage/'.$resultaBF->bea_cheminImage) }}" width="100px" height="50px"> </th>
    
        <th rowspan="4"> {{ $resultaBF->bea_nom }} </th>

        <th rowspan="4"> {{ $resultaBF->bea_dureeExtrait }}</th>
        <th rowspan="4"> 
            
            <a class= "btn btn-danger" href="{{url('/supprimer/' .$resultaBF->bf_id)}}" > Supprimer</a>
       </th> 
        <?php
         } 
        $i++ ; 
        if($i == 4) {
             $i = 0 ;
             } ?> 
        <th> {{ $resultaBF->bf_prix }} </th> 
        <th> {{ $resultaBF->bf_taille }} </th>
       
        <th> {{ $resultaBF->for_nom }}</th>
       

</tr>
@endforeach
</table>

</div>
    </div>
       </div>
          </div>
               </div>
                  </div>
@endsection