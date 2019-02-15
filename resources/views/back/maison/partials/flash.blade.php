@if(Session::has('message'))
<div class="alert">
    <p class='btn btn-success'>{{Session::get('message')}}</p>
</div>
@endif