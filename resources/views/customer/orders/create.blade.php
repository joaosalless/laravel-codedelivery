@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Novo Pedido</h3>

    <br>

    @include('partials.form_errors', ['listErrors' => false])
    @include('flash::message')

    {!! Form::open(['route' => 'customer.orders.store']) !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <div class="row">
                        <div class="col-md-12" style="padding:0 10px">
                            {!! Form::submit('Enviar Pedido', ['class' => 'btn btn-success pull-right']) !!}
                            <a href="{{ route('customer.orders.index') }}" class="btn btn-default pull-right" style="margin:0 10px 0 0">Cancelar</a>
                            <button id="btnNewItem" class="pull-left btn btn-default" type="button"><i class="fa fa-plus-circle"></i> Incluir mais 1 produto</button>
                        </div>
                    </div>
                </h3>
            </div>

            <div class="panel-body">
                @include('customer.orders._form')
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection

@section('post-script')
    <script>
        $('#btnNewItem').click(function() {

            var row = $("table tbody#orderItemsList > tr:last"),
                newRow = row.clone(),
                length = $("table tbody#orderItemsList tr").length;

            newRow.find('td').each(function() {
                var td = $(this),
                    input = td.find('input, select'),
                    name = input.attr('name');

                input.attr('name', name.replace((length -1) + "", length + ""));
            });

            newRow.find('input').val(1);
            newRow.insertAfter(row);
            calculateTotal();
        });

        $(document.body).on('click', 'select', function() {
            calculateTotal();
        });

        $(document.body).on('blur', 'input', function() {
            calculateTotal();
        })

        function calculateTotal() {
            var total = 0,
                subtotal = 0,
                shipping = 5,
                trLen = $('table tbody#orderItemsList tr').length,
                tr = null, price, qtd, totals;

            for (var i = 0; i < trLen; i++) {
                tr = $('table tbody#orderItemsList tr').eq(i);
                price = tr.find(':selected').data('price');
                qtd = tr.find('input').val();
                totals = price * qtd;

                tr.find('input[name*=totals]').val(totals.toFixed(2));
                subtotal += totals;

                total = subtotal + shipping;
            }

            $('#subtotal').html(subtotal.toFixed(2));
            $('#shipping').html(shipping.toFixed(2));
            $('#total').html(total.toFixed(2));
        }
    </script>
@endsection
