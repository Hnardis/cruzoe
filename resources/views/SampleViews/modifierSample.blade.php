@extends('layouts.beats.barre') 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Etape 2 : Modifier un Sample</div>
                <div class="panel-body">

                        <th> <img src="{{ asset('storage/'. $modif_Sam->sam_cover) }}" width="100px" height="50px"> </th>
                    
                    {!! Form::open(array('action' => 'AddSampleController@updateSample','enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!}
                                        
                        <div class="form-group{{ $errors->has('sam_nom') ? ' has-error' : '' }}">
                            {{ Form::label('sam_nom', 'Titre du Sample ', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text ('sam_nom', $modif_Sam->sam_nom, array('class' => 'form-control')) }}
                                <span class="help-block">
                                    <strong>{{ $errors->first('sam_nom') }}</strong>
                                </span>
                            </div>
                        </div>      
                        {{ Form::hidden ('sam_id', $modif_Sam->sam_id, array('class' => 'form-control')) }}              
                        
                    
                    <div class="form-group{{ $errors->has('sam_prix') ? ' has-error' : '' }}">
                        {{ Form::label('sam_prix', 'Prix ', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::number ('sam_prix', $modif_Sam->sam_prix, array('class' => 'form-control')) }}
                            <span class="help-block">
                                <strong>{{ $errors->first('sam_prix') }}</strong>
                            </span>
                        </div>
                    </div>    

 <div class="form-group{{ $errors->has('sample') ? ' has-error' : '' }}">
                        {{ Form::label('sample', 'Samples', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {!! Form::file('sample', ['class' => 'form-control-file', 'accept' => '.zip']) !!}
                            <span class="help-block">
                                <strong>{{ $errors->first('sample') }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('sam_poche') ? ' has-error' : '' }}">
                        {{ Form::label('sam_poche', 'Modifier la pochette', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {!! Form::file('sam_poche', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                            <span class="help-block">
                                <strong>{{ $errors->first('sam_poche') }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="text-center">
                        {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
                    </div>

                {!! Form::close()!!}
               </div>
            </div>
        </div>
    </div>
</div>
@endsection