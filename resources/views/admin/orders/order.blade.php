<div class="row">
    <div class="col-xs-12">
        <div class="invoice-title">
            <h2>Pedido #{{ $order->id }}</h2>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-8">
                <address>
                <strong>Cliente:</strong><br>
                    {{ $order->client->user->name }}<br>
                    {{ $order->client->phone }}<br>
                </address>

                <address>
                <strong>Endereço de Entrega:</strong><br>
                    {{ $order->client->address }}, {{ $order->client->district }}<br>
                    {{ $order->client->city }}, {{ $order->client->state }} -  {{ $order->client->zipcode }}<br><br>
                </address>
            </div>

            <div class="col-xs-4 text-right">
                <address>
                    <strong>Data do Pedido:</strong><br>
                    {{ $order->present()->getCreatedAt }}<br>
                </address>

                <address>
                    <strong>Status do Pedido:</strong><br>
                    {{ $order->present()->getStatus }}
                </address>

                @if (!empty($order->deliveryman) && ($order->status == 1 || $order->status == 2))
                <address>
                    <strong>Entregador:</strong><br>
                    {{ $order->deliveryman->name }}
                </address>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <address>
                    <strong>Forma de Pagamento:</strong><br>
                    {{ $order->payment_method }}
                </address>
            </div>
            @if ($order->cupom)
            <div class="col-xs-8">
                <address>
                    <strong>Cupom de Desconto:</strong><br>
                    Código: {{ $order->cupom->code }}<br>
                    Valor : {{ $order->cupom->present()->getValue }}<br>
                </address>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-margin">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Resumo do pedido</strong></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed no-margin">
                        <thead>
                            <tr>
                                <td><strong>Item</strong></td>
                                <td class="text-center" style="width:170px"><strong>Preço</strong></td>
                                <td class="text-center" style="width:170px"><strong>Quantidade</strong></td>
                                <td class="text-right"  style="width:170px"><strong>Totais</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td class="text-center">{{ $item->present()->getPrice }}</td>
                                <td class="text-center">{{ $item->qtd }}</td>
                                <td class="text-right">{{ $item->present()->getTotals }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                <td class="thick-line text-right">{{ $order->present()->getSubtotal }}</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Taxa de Entrega</strong></td>
                                <td class="no-line text-right">{{ $order->present()->getShippingCosts }}</td>
                            </tr>
                            @if ($order->cupom_id)
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Desconto</strong></td>
                                <td class="no-line text-right">{{ $order->cupom->present()->getValue }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right"><strong>{{ $order->present()->getTotal }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
