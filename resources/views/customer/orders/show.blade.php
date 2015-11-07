@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Detalhes do Pedido</h3>
    <br>

    <div class="panel panel-default">
        <div class="panel-body">
            @include('customer.orders.order')
        </div>
    </div>
</div>

@endsection
