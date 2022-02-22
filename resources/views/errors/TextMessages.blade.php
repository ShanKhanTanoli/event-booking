@if(Session::has('success'))
<span id="errors" class="text-success errors" role="alert">
    <strong>{{ Session::get('success') }}</strong>
</span>
@endif

@if(Session::has('error'))
<span id="errors" class="text-danger errors" role="alert">
    <strong>{{ Session::get('error') }}</strong>
</span>
@endif