@extends('layouts.beats.barre')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> ROBINSON CRUZOE</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Bienvenue</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
