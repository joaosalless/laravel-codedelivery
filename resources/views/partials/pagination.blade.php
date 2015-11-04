@if ($registers->total() > 0)
    <div class="panel-footer">
        <div class="row">
            <div class="pull-left" style="padding: 0 10px; line-height: 34px;">
                <strong>{{ $registers->total() }}</strong> registro{!! $registers->total() > 1 ? 's' : '' !!}.
            </div>
            <div class="pull-right" style="padding:0 10px; height: 34px;">
                {!! $registers->appends(\Request::except('page'))->render()!!}
            </div>
        </div>
    </div>
@endif
