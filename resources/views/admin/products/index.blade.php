@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Produtos</h3>

    <br>

    @include('flash::message')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-6">
                        @include('partials.search', ['route' => 'admin/products'])
                    </div>

                    <div class="col-md-4 pull-right">
                        <a href="{{route('admin.products.create')}}" class="pull-right btn btn-success">Novo Produto</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-striped table-bordered no-margin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th style="width:178px">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->present()->getPrice }}</td>
                            <td>
                                <a href="{{ route('admin.products.show', ['id' => $product->id]) }}" class="btn btn-xs btn-primary">visualizar</a>
                                <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-xs btn-warning">editar</a>
                                <a href="{{ route('admin.products.destroy', ['id' => $product->id]) }}" class="btn btn-xs btn-danger">excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('partials.pagination', ['registers' => $products])
    </div>
</div>

@endsection
