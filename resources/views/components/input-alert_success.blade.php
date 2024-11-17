@props(['messages'])

@if(session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible text-center" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Yopmoq"></button>
    </div>
@endif

@error('error')
<div class="alert alert-danger" role="alert">{{ $message }}</div>
@enderror
