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
                        <td>Criada em</td>
                        <td>{{ $category->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Atualizada em</td>
                        <td>{{ $category->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
