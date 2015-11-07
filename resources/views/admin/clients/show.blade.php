@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Detalhes do Cliente</h3>

    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-4 pull-right">
                        <a href="{{ route('admin.clients.edit', ['id' => $client->id]) }}" class="pull-right btn btn-warning">editar</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped no-margin">
                <tbody>
                    <tr>
                        <td style="width:200px">ID</td>
                        <td>{{ $client->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $client->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $client->user->email }}</td>
                    </tr>
                    <tr>
                        <td>Telefone</td>
                        <td>{{ $client->present()->getPhone }}</td>
                    </tr>
                    <tr>
                        <td>Emdereço</td>
                        <td>{{ $client->address }}</td>
                    </tr>
                    <tr>
                        <td>Cidade</td>
                        <td>{{ $client->city }}</td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td>{{ $client->state }}</td>
                    </tr>
                    <tr>
                        <td>CEP</td>
                        <td>{{ $client->present()->getZipcode }}</td>
                    </tr>
                    <tr>
                        <td>Criado em</td>
                        <td>{{ $client->present()->getCreatedAt }}</td>
                    </tr>
                    <tr>
                        <td>Atualizado em</td>
                        <td>{{ $client->present()->getUpdatedAt }}</td>
                    </tr>
                    <tr>
                        <td>Pedidos Efetuados</td>
                        <td>{{ $client->present()->getQtdOrders }}</td>
                    </tr>
                    <tr>
                        <td>Total de Pedidos Efetuados</td>
                        <td>{{ $client->present()->getTotalOrders }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
