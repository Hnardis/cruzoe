@extends('layouts.beats.barre') 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Etape 2 : Uploader les beats </div>
                <div class="panel-body">
                    {!! Form::open(array('action' => 'AjoutController@storeBeatFormat1','enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!}

                    <div class="container">
       
       
                 @foreach($formats as $f)
                        <div class="row">
                               <div class="col-md-4 ">
                                   {{$f->for_nom}}
                                  {{ Form::hidden('for_id[]', $f->for_id) }}
                                  
                               </div>
       
                               <div class="col-md-4 ">
                                       <div class="form-group{{ $errors->has('prix') ? ' has-error' : '' }}">
                                                   {{ Form::number('prix[]', old('prix'), array('class' => 'form-control')) }}
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('prix') }}</strong>
                                                   </span>
                                               </div>
                                </div>
       
                                <div class="col-md-4 ">
                                        <div class="form-group{{ $errors->has('audio') ? ' has-error' : '' }}">         
                                                       {!! Form::file('audio[]', ['class' => 'form-control-file', 'accept' => $f->for_extension]) !!}
                                                       <span class="help-block">
                                                           <strong>{{ $errors->first('audio') }}</strong>
                                                       </span>                                      
                                        </div>
       
                                 </div>
                        </div>
       
                  @endforeach            
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