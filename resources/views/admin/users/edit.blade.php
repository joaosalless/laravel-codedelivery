@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Editar Usuário</h3>

    <br>

    @include('partials.form_errors', ['listErrors' => false])
    @include('flash::message')

    <div class="panel panel-default">
        {!! Form::model($user, ['route' => ['admin.users.update', $user->id]]) !!}
            <div class="panel-body">
                @include('admin.users._form')
            </div>

            <div class="panel-footer">
                {!! Form::submit('Salvar Usuário', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.users.index') }}" class="btn btn-default">Cancelar</a>

                @if ($user->isDeletable())
                    <a href="{{ route('admin.users.destroy', ['id' => $user->id]) }}" class="pull-right btn btn-danger">Excluir</a>
                @else
                    <span class="pull-right btn btn-danger disabled">Excluir</span>
                @endif
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
