
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-hover no-margin">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th style="width:200px">Totais</th>
                </tr>
            </thead>
            <tbody id="orderItemsList">
                <tr>
                    <td>
                        <select name="items[0][product_id]" class="form-control">
                            @foreach ($products as $p)
                                <option value="{{ $p->id }}" data-price="{{ $p->price }}">{{ $p->name }} --- {{ $p->price }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        {!! Form::text('items[0][qtd]', 1, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">R$</span>
                            {!! Form::text('items[0][totals]', 1, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1', 'style' => 'text-align:right', 'disabled' => 'disabled']) !!}
                        </div>
                    </td>
                </tr>
            </tbody>

            <tbody id="orderSubtotals">
                <tr>
                    <td colspan="2" style="text-align:right"><strong>Subtotal</strong></td>
                    <td style="text-align:right;">
                        R$&nbsp;<span id="subtotal" class="pull-right"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right"><strong>Taxa de Entrega</strong></td>
                    <td style="text-align:right;">
                        R$&nbsp;<span id="shipping" class="pull-right"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right;"><strong>Total</strong></td>
                    <td style="text-align:right; background:#f6f6f6">
                        R$&nbsp;<strong id="total" class="pull-right">0.00</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
