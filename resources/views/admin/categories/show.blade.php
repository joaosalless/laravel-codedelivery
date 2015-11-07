@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Detalhes da Categoria</h3>

    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-4 pull-right">
                        <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="pull-right btn btn-warning">editar</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped no-margin">
                <tbody>
                    <tr>
                        <td style="width:200px">ID</td>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome da Categoria</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <td>Criado em</td>
                        <td>{{ $category->present()->getCreatedAt }}</td>
                    </tr>
                    <tr>
                        <td>Atualizado em</td>
                        <td>{{ $category->present()->getUpdatedAt }}</td>
                    </tr>
                    <tr>
                        <td>Quantidade de Produtos</td>
                        <td>{{ $category->present()->getQtdProducts }}</td>
                    </tr>
                    {{-- <tr>
                        <td>Valor Total de Produtos</td>
                        <td>{{ $category->present()->getTotalValorProducts }}</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
