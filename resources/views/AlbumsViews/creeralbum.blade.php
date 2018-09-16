@extends('layouts.beats.barre')
@section('content')

{!! Form::open(array('action' => 'AlbumController@store','enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!}

<div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-heading">   Formulaire de creation d'albums  </div>
                       <div class="panel-body">
    
                        <div class="form-group{{ $errors->has('album_titre') ? ' has-error' : '' }}">
                            {{ Form::label('album_titre', 'Titre  Album ', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text ('album_titre', old('album_titre'), array('class' => 'form-control','placeholder' => 'titre')) }}
                                <span class="help-block">
                                    <strong>{{ $errors->first('album_titre') }}</strong>
                                </span>
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('album_pochette') ? ' has-error' : '' }}">
                            {{ Form::label('album_pochette', 'Cover', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {!! Form::file('album_pochette', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                                <span class="help-block">
                                    <strong>{{ $errors->first('album_pochette') }}</strong>
                                </span>
                            </div>
                        </div>

                        </div>
                             </div>
                                 </div>
                                   
                                        




                                 




        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">   Listes des Beats uploaders  </div>
                   <div class="panel-body">

<table class="table table-hover">


<tr>
    <th> Cover </th>
    <th> Date de creation </th>
    <th> Nom du fichier</th>

</tr>

      @foreach($resultBF as $resultaBF )
     
<tr>
        <th> <img src="{{ asset('storage/'.$resultaBF->bea_cheminImage) }}" width="100px" height="50px"> </th>
         <th> {{ $resultaBF->updated_at }} </th> 
         {{-- <th> {{ $resultaBF->bf_chemin }} </th>  --}}
        <th> {{ $resultaBF->bea_nom }} </th> 
        <th> {{ Form:: checkbox('name', 'value')}} <th>
       
</tr>
@endforeach

</table>

</div>
    </div>
       </div>

     
          </div>
               </div>
                <div class="text-center">
                            {{ Form::submit('Enregistrer', array('class' => 'btn btn-success')) }}
                        </div>  

                        {!! Form::close()!!}
@endsection
