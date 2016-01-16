@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Detalhes do Usuário</h3>

    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-4 pull-right">
                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="pull-right btn btn-warning">editar</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped no-margin">
                <tbody>
                    <tr>
                        <td style="width:200px">ID</td>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Nível de Usuário</td>
                        <td><span class="label label-{{ $user->present()->getRoleClass }}">{{ $user->present()->getRole }}</span></td>
                    </tr>
                    @if ($user->role == 'deliveryman')
                    <tr>
                        <td>Entregas Efetuadas</td>
                        <td>{{ $user->present()->getQtdDeliverymanOrders }}</td>
                    </tr>
                    <tr>
                        <td>Total em Entregas Efetuadas</td>
                        <td>{{ $user->present()->getTotalDeliverymanOrders }}</td>
                    </tr>
                    @endif

                    @if ($user->client)
                    <tr>
                        <td>Telefone</td>
                        <td>{{ $user->client->present()->getPhone }}</td>
                    </tr>
                    <tr>
                        <td>Endereço</td>
                        <td>{{ $user->client->address }}</td>
                    </tr>
                    <tr>
                        <td>Cidade</td>
                        <td>{{ $user->client->city }}</td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td>{{ $user->client->state }}</td>
                    </tr>
                    <tr>
                        <td>CEP</td>
                        <td>{{ $user->client->present()->getZipcode }}</td>
                    </tr>
                    <tr>
                        <td>Pedidos Efetuados</td>
                        <td>{{ $user->client->present()->getQtdOrders }}</td>
                    </tr>
                    <tr>
                        <td>Total de Pedidos Efetuados</td>
                        <td>{{ $user->client->present()->getTotalOrders }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td>Criado em</td>
                        <td>{{ $user->present()->getCreatedAt }}</td>
                    </tr>
                    <tr>
                        <td>Atualizado em</td>
                        <td>{{ $user->present()->getUpdatedAt }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
