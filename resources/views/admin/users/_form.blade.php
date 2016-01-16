
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('name', 'Nome') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('role', 'Nível de Usuário') !!}
            {!! Form::select('role', $roles, null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('role') }}</small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('password', 'Senha') !!}
            <input type="password" class="form-control" name="password">
            <small class="text-danger">{{ $errors->first('password') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirme a Senha') !!}
            <input type="password" class="form-control" name="password_confirmation">
            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('client[phone]', 'Telefone') !!}
            {!! Form::text('client[phone]', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('client.phone') }}</small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('client[address]', 'Endereço') !!}
            {!! Form::textarea('client[address]', null, ['class' => 'form-control', 'rows' => 3]) !!}
            <small class="text-danger">{{ $errors->first('client.address') }}</small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('client[city]', 'Cidade') !!}
            {!! Form::text('client[city]', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('client.city') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('client[state]', 'Estado') !!}
            {!! Form::text('client[state]', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('client.state') }}</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('client[zipcode]', 'CEP') !!}
            {!! Form::text('client[zipcode]', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('client.zipcode') }}</small>
        </div>
    </div>

</div>
