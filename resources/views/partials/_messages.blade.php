
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    <strong> {{ Session::get('success') }} </strong>
</div>
<div class="alert alert-danger" role="alert">
    <strong> {{ Session::get('failure') }} </strong>
</div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <strong>Errors</strong>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif