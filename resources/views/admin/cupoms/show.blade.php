@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Detalhes do Cupom</h3>

    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-4 pull-right">
                        <a href="{{ route('admin.cupoms.edit', ['id' => $cupom->id]) }}" class="pull-right btn btn-warning">editar</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped no-margin">
                <tbody>
                    <tr>
                        <td style="width:200px">ID</td>
                        <td>{{ $cupom->id }}</td>
                    </tr>
                    <tr>
                        <td>Código</td>
                        <td>{{ $cupom->code }}</td>
                    </tr>
                    <tr>
                        <td>Valor</td>
                        <td>{{ $cupom->present()->getValue }}</td>
                    </tr>
                    <tr>
                        <td>Utilizado</td>
                        <td>{{ $cupom->present()->getUsed }}</td>
                    </tr>

                    @if ($cupom->used > 0)
                    <tr>
                        <td>Utilizado Por</td>
                        <td><a href="{{ route('admin.clients.show', ['id' => $cupom->present()->getUsedByClientid]) }}">{{ $cupom->present()->getUsedByClientName }}</a></td>
                    </tr>
                    <tr>
                        <td>Utilizado em</td>
                        <td>{{ $cupom->present()->getUsedAt }}</td>
                    </tr>
                    @endif

                    <tr>
                        <td>Criado em</td>
                        <td>{{ $cupom->present()->getCreatedAt }}</td>
                    </tr>
                    <tr>
                        <td>Atualizado em</td>
                        <td>{{ $cupom->present()->getUpdatedAt }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
