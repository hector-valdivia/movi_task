@if( session('success') )
    <div class="alert alert-success mt-5" role="alert">
        {{ session('success') }}
    </div>
@endif

@if( session('danger') )
    <div class="alert alert-danger mt-5" role="alert">
        {{ session('danger') }}
    </div>
@endif
