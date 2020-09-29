@extends('layouts.app')

@section('content')
<h2>Add</h2>
{!! Form::open(['action' => 'ProductController@store', 'method' => 'post', 'files' => true]) !!}
<div class="form-group">
  {{Form::label('name', 'Name')}}
  {{Form::text('name', '', ['class' => 'form-control'])}}
</div>

<div class="form-group">
  {{Form::label('price', 'Price')}}
  {{Form::number('price', '', ['class' => 'form-control'])}}
</div>

<div class="form-group">
  {{Form::label('description', 'Description')}}
  {{Form::textarea('description', '', ['class' => 'form-control'])}}
</div>

<div class="form-group">
  {{Form::file('cover_image')}}
</div>

<!-- <div>
  {{Form::}}
</div> -->
{{Form::submit('Add', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection