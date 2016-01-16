@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Usuários</h3>

    <br>

    @include('flash::message')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-6">
                        @include('partials.search', ['route' => 'admin/users'])
                    </div>

                    <div class="col-md-4 pull-right">
                        <a href="{{route('admin.users.create')}}" class="pull-right btn btn-success">Novo Usuário</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-striped table-bordered  no-margin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nível</th>
                        <th style="width:128px">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="label label-{{ $user->present()->getRoleClass }}">{{ $user->present()->getRole }}</span></td>
                            <td>
                                <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" class="btn btn-xs btn-primary">visualizar</a>
                                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-xs btn-warning">editar</a>
                                {{-- <a href="{{ route('admin.users.destroy', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">excluir</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('partials.pagination', ['registers' => $users])
    </div>
</div>

@endsection
