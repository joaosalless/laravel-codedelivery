@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Clientes</h3>

    <br>

    @include('flash::message')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-6">
                        @include('partials.search', ['route' => 'admin/clients'])
                    </div>

                    <div class="col-md-4 pull-right">
                        <a href="{{route('admin.clients.create')}}" class="pull-right btn btn-success">Novo Cliente</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-striped table-bordered no-margin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th style="width:178px">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->user->name }}</td>
                            <td>{{ $client->present()->getEmail }}</td>
                            <td>{{ $client->present()->getPhone }}</td>
                            <td>
                                <a href="{{ route('admin.clients.show', ['id' => $client->id]) }}" class="btn btn-xs btn-primary">visualizar</a>
                                <a href="{{ route('admin.clients.edit', ['id' => $client->id]) }}" class="btn btn-xs btn-warning">editar</a>
                                <a href="{{ route('admin.clients.destroy', ['id' => $client->id]) }}" class="btn btn-xs btn-danger">excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('partials.pagination', ['registers' => $clients])
    </div>
</div>

@endsection
