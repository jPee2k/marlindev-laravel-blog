@if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('status') }}
    </div>
@elseif (Session::has('alert'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('alert') }}
    </div>
@elseif (Session::has('info'))
    <div class="alert alert-info" role="alert">
        {{ Session::get('info') }}
    </div>
@endif
