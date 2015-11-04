
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('user[name]', 'Nome') !!}
            {!! Form::text('user[name]', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('user[name]') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('user[email]', 'Email') !!}
            {!! Form::text('user[email]', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('user[email]') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('phone', 'Telefone') !!}
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('phone') }}</small>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('address', 'Endereço') !!}
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3]) !!}
            <small class="text-danger">{{ $errors->first('address') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('city', 'Cidade') !!}
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('city') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('state', 'Estado') !!}
            {!! Form::text('state', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('state') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('zipcode', 'CEP') !!}
            {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('zipcode') }}</small>
        </div>
    </div>

</div>
