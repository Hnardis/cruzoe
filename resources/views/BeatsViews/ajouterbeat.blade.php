@extends('layouts.beats.barre')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter Beat</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('bea_nom') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom du Beat :</label>

                            <div class="col-md-6">
                                <input id="name" name="bea_nom" type="text" class="form-control"  value="{{ old('bea_nom') }}">

                                @if ($errors->has('bea_nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bea_nom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                            <div class="form-group{{ $errors->has('format') ? ' has-error' : '' }}">
                                                        <label for="name" class="col-md-4 control-label">Format :</label>

                                                        <div class="col-md-6">
                                                        <select name="format" id="format" class="form-control" value="{{ old('format') }}">
                                    @foreach($format as $form)
                                            <option value="{{$form->for_id}}" >{{$form->for_nom}} </option>
                                    @endforeach
                                            </select>

                                @if ($errors->has('format'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('format') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('bea_dureeExtrait') ? ' has-error' : '' }}">
                            <label for="bea_dureeExtrait" class="col-md-4 control-label">Duree de l'extrait  :</label>

                            <div class="col-md-6">
                                <input id="bea_dureeExtrait" name="bea_dureeExtrait" type="text" class="form-control"  value="{{ old('name') }}">

                                @if ($errors->has('bea_dureeExtrait'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bea_dureeExtrait') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('bf_chemin') ? ' has-error' : '' }}">
                            <label for="bf_chemin" class="col-md-4 control-label">Fichier Beat  :</label> 
                                <div class="col-md-5">
                                    {!! Form::file('bf_chemin', ['class'=> 'form-control-file'])   !!}
                                </div>
                        </div>

                         <div class="form-group{{ $errors->has('bea_cheminImage') ? ' has-error' : '' }}">
                                <label for="bea_cheminImage" class="col-md-4 control-label">Fichier image  :</label>
                                <div class="col-md-5">
                                    {!! Form::file('bea_cheminImage', ['class'=> 'form-control-file'])   !!}
                                </div>
      
                        </div>



                         <div class="form-group{{ $errors->has('bf_taille') ? ' has-error' : '' }}">
                            <label for="bf_taille" class="col-md-4 control-label">Taille du Beat  :</label>

                            <div class="col-md-6">
                                <input id="bf_taille" name="bf_taille" type="text" class="form-control" value="{{ old('bf_taille') }}">

                                @if ($errors->has('bf_taille'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bf_taille') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bf_prix') ? ' has-error' : '' }}">
                            <label for="bf_prix" class="col-md-4 control-label">Prix du beat :</label>

                            <div class="col-md-6">
                                <input id="bf_prix" name="bf_prix" type="text" class="form-control"  value="{{ old('bf_prix') }}">

                                @if ($errors->has('bf_prix'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bf_prix') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Ajouter
                                </button>
                            </div>
                        </div>
                     </form>
                 </div>
            </div>
        </div>
    </div>
</div>  
      @endsection

      
