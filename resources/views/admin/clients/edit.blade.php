@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Editaando Cliente: {{ $client->id }}</h3>

    <br>

    @include('partials.form_errors', ['listErrors' => false])
    @include('flash::message')

    <div class="panel panel-default">
        {!! Form::model($client, ['route' => ['admin.clients.update', 'id' => $client->id]]) !!}
            <div class="panel-body">
                @include('admin.clients._form')
            </div>

            <div class="panel-footer">
                {!! Form::submit('Salvar Cliente', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.clients.index') }}" class="btn btn-default">Cancelar</a>

                @if ($client->isDeletable())
                    <a href="{{ route('admin.clients.destroy', ['id' => $client->id]) }}" class="pull-right btn btn-danger">Excluir</a>
                @else
                    <span class="pull-right btn btn-danger disabled">Excluir</span>
                @endif
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
