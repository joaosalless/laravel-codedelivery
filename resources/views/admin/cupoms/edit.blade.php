@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Editar Cupom</h3>

    <br>

    @include('partials.form_errors', ['listErrors' => false])
    @include('flash::message')

    <div class="panel panel-default">
        {!! Form::model($cupom, ['route' => ['admin.cupoms.update', $cupom->id]]) !!}
            <div class="panel-body">
                @include('admin.cupoms._form')
            </div>

            <div class="panel-footer">
                {!! Form::submit('Salvar Cupom', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.cupoms.index') }}" class="btn btn-default">Cancelar</a>

                @if ($cupom->isDeletable())
                    <a href="{{ route('admin.cupoms.destroy', ['id' => $cupom->id]) }}" class="pull-right btn btn-danger">Excluir</a>
                @else
                    <span class="pull-right btn btn-danger disabled">Excluir</span>
                @endif
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
