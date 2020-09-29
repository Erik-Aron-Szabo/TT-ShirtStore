@if(session('error'))
<div class="alert-danger alert">
  {{session('error')}}
</div>
@endif