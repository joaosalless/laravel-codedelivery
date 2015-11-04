@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Detalhes do Produto</h3>

    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-4 pull-right">
                        <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="pull-right btn btn-warning">editar</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped no-margin">
                <tbody>
                    <tr>
                        <td style="width:200px">ID</td>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome do Produto</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td>Categoria</td>
                        <td>{{ $product->category->name }}</td>
                    </tr>
                    <tr>
                        <td>Preço</td>
                        <td>R$ {{ $product->price }}</td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <td>Criado em</td>
                        <td>{{ $product->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Atualizado em</td>
                        <td>{{ $product->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
