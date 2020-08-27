@if (Session::has('status'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('status') }}
    </div>
@endif
