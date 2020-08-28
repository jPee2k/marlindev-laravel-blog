@if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('status') }}
    </div>
@endif
@if (Session::has('alert'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('alert') }}
    </div>
@endif
