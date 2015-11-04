@extends('app')

@section('content')

<div class="col-md-12">
    <h2>Editar Status do Pedido: #{{ $order->id }}</h2>

    <br>

    @include('partials.form_errors', ['listErrors' => false])
    @include('flash::message')

    {!! Form::model($order, ['route' => ['admin.orders.update', $order->id]]) !!}
        @include('admin.orders._form')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <div class="row">
                        <div class="col-md-4 pull-right" style="padding:0">
                            {!! Form::submit('Salvar Status', ['class' => 'btn btn-primary pull-right', 'style' => 'margin:0 10px 0 0']) !!}
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-default pull-right" style="margin:0 10px 0 0">Cancelar</a>
                            @if ($order->isDeletable())
                                <a href="{{ route('admin.orders.destroy', ['id' => $order->id]) }}" class="pull-right btn btn-danger" style="margin:0 10px !important">Excluir</a>
                            @else
                                <span class="pull-right btn btn-danger disabled" style="margin:0 10px 0 0">Não pode ser excluído</span>
                            @endif
                        </div>
                    </div>
                </h3>
            </div>

            <div class="panel-body">
                @yield('status_edit')
            </div>

            <div class="panel-body" style="border-top: 1px solid #ddd">
                @include('admin.orders.order')
            </div>
        </div>
    {!! Form::close() !!}
</div>

@endsection
