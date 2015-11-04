@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Nova Categoria</h3>

    <br>

    @include('partials.form_errors', ['listErrors' => false])
    @include('flash::message')
    
    <div class="panel panel-default">
        {!! Form::open(['route' => 'admin.categories.store']) !!}
            <div class="panel-body">
                @include('admin.categories._form')
            </div>

            <div class="panel-footer">
                {!! Form::submit('Criar Categoria', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Cancelar</a>
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
