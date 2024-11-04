@props(['messages'])

@if(session('message'))
    <div id="success-alert" class="alert alert-success alert-dismissible text-center" role="alert">
        <strong>{{session('message')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Yopmoq"></button>
    </div>
@endif
