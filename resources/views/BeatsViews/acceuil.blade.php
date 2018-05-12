@extends('layouts.beats.barre')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Page d'acceuil</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        
                    <ul class="nav navbar-nav">
                       <li><a href="{{ url('/ajout') }}">Ajouter Beats</a></li>
                    </ul>

                    <ul class="nav navbar-nav">
                      <li><a href="{{ url('#') }}">Ajouter Sample</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
