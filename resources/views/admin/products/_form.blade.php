
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('category_id', 'Categoria') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('category_id') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('name', 'Nome') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('price', 'Preço') !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('price') }}</small>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Descrição') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('description') }}</small>
</div>
