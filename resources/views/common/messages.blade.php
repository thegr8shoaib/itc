@if (isset($errors) && $errors->any())
@foreach ($errors->all() as $key => $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <p class="mb-0">
        {!! $error !!}
    </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforEach
@endif

@if (Session::has('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p class="mb-0">
        {!! Session::get('status') !!}
    </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
