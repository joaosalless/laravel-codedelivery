{!! Form::open(array('url' => $route, 'method' => 'get')) !!}
<div class="input-group">
    {!! Form::text('search', \Request::get('search'), ['class' => 'form-control', 'id' => 'search', 'placeholder' => 'buscar...']) !!}
    <span class="input-group-btn">
        <button class="btn btn-default" type="button" onClick="this.form.submit();"><i class="fa fa-search"></i></button>
    </span>
</div>
{!! Form::close() !!}
