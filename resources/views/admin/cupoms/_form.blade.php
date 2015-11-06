
<div class="form-group">
    {!! Form::label('code', 'Código') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('code') }}</small>
</div>

<div class="form-group">
    {!! Form::label('value', 'Valor') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('value') }}</small>
</div>
