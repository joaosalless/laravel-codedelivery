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
                        @include('partials.search', ['route' => 'customer/orders'])
                    </div>

                    <div class="col-md-4 pull-right">
                        <a href="{{route('customer.orders.create')}}" class="pull-right btn btn-success">Novo Pedido</a>
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
                            <th>Total</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th style="width:90px">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>R$ {{ $order->total }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <a href="{{ route('customer.orders.show', ['id' => $order->id]) }}" class="btn btn-xs btn-primary">visualizar</a>
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
