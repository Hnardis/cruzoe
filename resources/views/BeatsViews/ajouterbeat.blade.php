@extends('layouts.beats.barre') 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Etape 1 : Informations sur le Beat</div>
                <div class="panel-body">
                    
                    {!! Form::open(array('action' => 'AjoutController@store','enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!}
                                        
                        <div class="form-group{{ $errors->has('bea_nom') ? ' has-error' : '' }}">
                            {{ Form::label('bea_nom', 'Titre du beat ', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text ('bea_nom', old('bea_nom'), array('class' => 'form-control')) }}
                                <span class="help-block">
                                    <strong>{{ $errors->first('bea_nom') }}</strong>
                                </span>
                            </div>
                        </div>                    
                                                
                        <div class="form-group{{ $errors->has('bea_dureeExtrait') ? ' has-error' : '' }}">
                            {{ Form::label('bea_dureeExtrait', 'Durée d\'extrait ', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text ('bea_dureeExtrait', old('bea_dureeExtrait'), array('class' => 'form-control')) }}
                                <span class="help-block">
                                    <strong>{{ $errors->first('bea_dureeExtrait') }}</strong>
                                </span>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('bea_pochette') ? ' has-error' : '' }}">
                            {{ Form::label('bea_pochette', 'Pochette', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {!! Form::file('bea_pochette', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                                <span class="help-block">
                                    <strong>{{ $errors->first('bea_pochette') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="text-center">
                            {{ Form::submit('Enregistrer', array('class' => 'btn btn-success')) }}
                        </div>

                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection