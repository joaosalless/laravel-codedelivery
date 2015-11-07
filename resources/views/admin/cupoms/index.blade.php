@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Cupons</h3>

    <br>

    @include('flash::message')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-6">
                        @include('partials.search', ['route' => 'admin/cupoms'])
                    </div>

                    <div class="col-md-4 pull-right">
                        <a href="{{route('admin.cupoms.create')}}" class="pull-right btn btn-success">Novo Cupom</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-striped table-bordered  no-margin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Valor</th>
                        <th>Utilizado</th>
                        <th style="width:178px">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cupoms as $cupom)
                        <tr>
                            <td># {{ $cupom->id }}</td>
                            <td>{{ $cupom->code }}</td>
                            <td>{{ $cupom->present()->getValue }}</td>
                            <td>{{ $cupom->present()->getUsed }}</td>
                            <td>
                                <a href="{{ route('admin.cupoms.show', ['id' => $cupom->id]) }}" class="btn btn-xs btn-primary">visualizar</a>
                                <a href="{{ route('admin.cupoms.edit', ['id' => $cupom->id]) }}" class="btn btn-xs btn-warning">editar</a>
                                <a href="{{ route('admin.cupoms.destroy', ['id' => $cupom->id]) }}" class="btn btn-xs btn-danger">excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('partials.pagination', ['registers' => $cupoms])
    </div>
</div>

@endsection
