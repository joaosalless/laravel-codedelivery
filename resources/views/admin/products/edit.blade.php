@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Editar Produto</h3>

    <br>

    @include('partials.form_errors', ['listErrors' => false])
    @include('flash::message')

    <div class="panel panel-default">
        {!! Form::model($product, ['route' => ['admin.products.update', $product->id]]) !!}
            <div class="panel-body">
                @include('admin.products._form')
            </div>

            <div class="panel-footer">
                {!! Form::submit('Salvar Produto', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.products.index') }}" class="btn btn-default">Cancelar</a>

                @if ($product->isDeletable())
                    <a href="{{ route('admin.products.destroy', ['id' => $product->id]) }}" class="pull-right btn btn-danger">Excluir</a>
                @else
                    <span class="pull-right btn btn-danger disabled">Excluir</span>
                @endif
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
