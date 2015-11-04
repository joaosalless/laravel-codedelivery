
@section('status_edit')
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('user_deliveryman_id', 'Entregador', ['class' => 'pull-left']) !!}
        {!! Form::select('user_deliveryman_id', $listsDeliveryman, null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon2', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('user_deliveryman_id') }}</small>
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('status', 'Status', ['class' => 'pull-left']) !!}
        {!! Form::select('status', $listsStatus, null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('status') }}</small>
    </div>
</div>
@endsection
