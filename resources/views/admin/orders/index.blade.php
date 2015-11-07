@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Pedidos</h3>

    <br>

    @include('flash::message')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-6">
                        @include('partials.search', ['route' => 'admin/orders'])
                    </div>

                    <div class="col-md-4 pull-right">
                        <a href="{{route('admin.orders.create')}}" class="pull-right btn btn-success">Novo Pedido</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered no-margin">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th style="width:155px">Data</th>
                            <th>Cliente</th>
                            <th>Itens</th>
                            <th style="width:130px">Total</th>
                            <th>Entregador</th>
                            <th>Status</th>
                            <th style="width:90px">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->present()->getCreatedAt }}</td>
                                <td>{{ $order->client->user->name }}</td>
                                <td>
                                    <table class="table table-condensed table-hover no-margin">
                                        <tbody class="small">
                                            @foreach ($order->items as $item)
                                                <tr>
                                                    <td style="width:15px">{{ $item->qtd }}</td>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td style="width:80px;text-align:right">{{ $item->present()->getTotals }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td><h4 style="margin:0" class="pull-right">{{ $order->present()->getTotal }}</h4></td>
                                <td>
                                    @if ($order->deliveryman)
                                        {{ $order->deliveryman->name }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>{{ $order->present()->getStatus }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.show', ['id' => $order->id]) }}" class="btn btn-xs btn-margin-bottom btn-primary">visualizar</a>
                                    <a href="{{ route('admin.orders.edit', ['id' => $order->id]) }}" class="btn btn-xs btn-margin-bottom btn-warning">editar</a>
                                    <a href="{{ route('admin.orders.destroy', ['id' => $order->id]) }}" class="btn btn-xs btn-danger">excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('partials.pagination', ['registers' => $orders])
    </div>
</div>

@endsection
