@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Novo Produto</h3>

    <br>

    @include('partials.form_errors', ['listErrors' => false])
    @include('flash::message')
    
    <div class="panel panel-default">
        {!! Form::open(['route' => 'admin.products.store']) !!}
            <div class="panel-body">
                @include('admin.products._form')
            </div>

            <div class="panel-footer">
                {!! Form::submit('Criar Produto', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.products.index') }}" class="btn btn-default">Cancelar</a>
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
