@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
@endsection
