@extends('master')

@section('title', $category->name)

@section('content')

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="{{ url('categories') }}">Back to Categories</a>
    <div class="page-header">
      <h1>{{ $category->name }}</h1>
    </div>
    <div class="btn-group">
      <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
    </div>
    <div class="btn-group">
      {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
