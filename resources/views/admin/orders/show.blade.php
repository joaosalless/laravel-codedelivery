@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Detalhes do Pedido</h3>
    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-4 pull-right" style="padding:0">
                        <a href="{{ route('admin.orders.edit', ['id' => $order->id]) }}" class="pull-right btn btn-warning" style="margin:0 10px !important"><i class="fa fa-fw fa-truck"></i> Editar Status / Entregador</a>
                        <a href="#" class="pull-right btn btn-default"><i class="fa fa-fw fa-print"></i> imprimir</a>
                    </div>
                </div>
            </h3>
        </div>
        <div class="panel-body">
            @include('admin.orders.order')
        </div>
    </div>
</div>

@endsection
