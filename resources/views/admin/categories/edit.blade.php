@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Editar Categoria</h3>

    <br>

    @include('partials.form_errors', ['listErrors' => false])
    @include('flash::message')

    <div class="panel panel-default">
        {!! Form::model($category, ['route' => ['admin.categories.update', $category->id]]) !!}
            <div class="panel-body">
                @include('admin.categories._form')
            </div>

            <div class="panel-footer">
                {!! Form::submit('Salvar Categoria', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Cancelar</a>

                @if ($category->isDeletable())
                    <a href="{{ route('admin.categories.destroy', ['id' => $category->id]) }}" class="pull-right btn btn-danger">Excluir</a>
                @else
                    <span class="pull-right btn btn-danger disabled">Excluir</span>
                @endif
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
