@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Categorias</h3>

    <br>

    @include('flash::message')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-6">
                        @include('partials.search', ['route' => 'admin/categories'])
                    </div>

                    <div class="col-md-4 pull-right">
                        <a href="{{route('admin.categories.create')}}" class="pull-right btn btn-success">Nova Categoria</a>
                    </div>
                </div>
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-striped table-bordered  no-margin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th style="width:128px">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('admin.categories.show', ['id' => $category->id]) }}" class="btn btn-xs btn-primary">visualizar</a>
                                <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="btn btn-xs btn-warning">editar</a>
                                {{-- <a href="{{ route('admin.categories.destroy', ['id' => $category->id]) }}" class="btn btn-xs btn-danger">excluir</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('partials.pagination', ['registers' => $categories])
    </div>
</div>

@endsection
