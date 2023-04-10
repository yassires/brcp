@if (Session::get('success'))
{{-- <div class="alert alert-success">
    {{Session::get('success')}}
</div> --}}

<div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if (Session::get('info'))
{{-- <div class="alert alert-info">
    {{Session::get('info')}}
</div> --}}

<div class="alert alert-info alert-dismissible" role="alert">
    {{Session::get('info')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if (Session::get('error'))
{{-- <div class="alert alert-danger">
    {{Session::get('error')}}
</div> --}}

<div class="alert alert-danger alert-dismissible" role="alert">
    {{Session::get('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->count() > 0)
    @foreach ($errors as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
    
@endif