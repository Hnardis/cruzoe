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
    {{-- <th> Date de creation </th> --}}
    <th> Nom du fichier</th>
    <th> Prix</th>
    <th> Taille</th>
    <th> Duree de l' Extrait</th>
    <th> Format</th>
    
</tr>

      @foreach($resultBF as $resultaBF )
     
<tr>
        <th> <img src="{{ asset('storage/'.$resultaBF->bea_cheminImage) }}" width="100px" height="50px"> </th>
         {{-- <th> {{ $resultaBF->updated_at }} </th>  --}}
        <th> {{ $resultaBF->bea_nom }} </th> 
        <th> {{ $resultaBF->bf_prix }} </th> 
        <th> {{ $resultaBF->bf_taille }} </th>
        <th> {{ $resultaBF->bea_dureeExtrait }}</th>
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