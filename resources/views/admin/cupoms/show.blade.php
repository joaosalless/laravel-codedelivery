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
                        <td>R$ {{ $cupom->code }}</td>
                    </tr>
                    <tr>
                        <td>Foi Utilizado</td>
                        <td>{{ $cupom->used }}</td>
                    </tr>
                    <tr>
                        <td>Criada em</td>
                        <td>{{ $cupom->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Atualizada em</td>
                        <td>{{ $cupom->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
