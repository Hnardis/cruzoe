@extends('layouts.beats.barre') 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Etape 2 : Uploader les beats </div>
                <div class="panel-body">
                    
                    {!! Form::open(array('action' => 'AjoutController@storeBeatFormat','enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!}
                    
                        <div class="form-group">
                            {{ Form::label('format', 'Format ', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                <select name="format" id="format" class="form-control" value="{{ old('format') }}">
                                    @foreach($formats as $f)
                                    <option value="{{$f->for_id}}" >{{$f->for_nom}} </option>
                                    @endforeach
                                </select>                            
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('prix') ? ' has-error' : '' }}">
                            {{ Form::label('prix', 'Prix ', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::number ('prix', old('prix'), array('class' => 'form-control')) }}
                                <span class="help-block">
                                    <strong>{{ $errors->first('prix') }}</strong>
                                </span>
                            </div>
                        </div>                    
                        
                        <div class="form-group{{ $errors->has('audio') ? ' has-error' : '' }}">
                            {{ Form::label('audio', 'Fichier audio', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {!! Form::file('audio', ['class' => 'form-control-file', 'accept' => 'audio/wav, audio/mpeg']) !!}
                                <span class="help-block">
                                    <strong>{{ $errors->first('audio') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="text-center">
                            {{ Form::submit('Uploader et terminer', array('class' => 'btn btn-success')) }}
                        </div>

                        {{ Form::hidden('bea_id', $beat->bea_id, array('class' => 'form-control')) }}

                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection