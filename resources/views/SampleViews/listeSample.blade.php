@extends('layouts.beats.barre') 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Etape 1 : Listes des samples uploader</div>
                <div class="panel-body">
                        <table class="table table-hover">
                    <tr>
                            <th> Cover </th>
                            <th> titre du Sample</th>
                             <th> Prix</th> 
                             <th> Action</th>
                    </tr>

                    @foreach($listSam as $listSample )
     
                    <tr>
                            <th> <img src="{{ asset('storage/'. $listSample->sam_cover) }}" width="100px" height="50px"> </th>
                           
                            <th> {{ $listSample->sam_nom }} </th> 
                            <th> {{ $listSample->sam_prix }} </th> 
                            <th>
                                    <a class= "btn btn-small btn-info"  href="{{url('/modifSample/' .$listSample->sam_id)}}" > Modifier</a>
                                    <a class= "btn btn-danger"  href="{{url('/Effacer/' .$listSample->sam_id)}}" > Effacer</a>
                            </th> 
                    
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection