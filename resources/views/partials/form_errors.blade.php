@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>Preencha o formulário corretamente!</strong>
    </div>

    @if ($listErrors)
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $error }}
        </div>
        @endforeach
    @endif
@endif
