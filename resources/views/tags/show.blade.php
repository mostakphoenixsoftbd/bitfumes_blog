@extends('master')

@section('title', $tag->name)

@section('content')

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="{{ url('tags') }}">Back to Tags</a>
    <div class="page-header">
      <h1>{{ $tag->name }}</h1>
    </div>
    <div class="btn-group">
      <a class="btn btn-primary" href="{{ route('tags.edit', $tag->id) }}">Edit</a>
    </div>
    <div class="btn-group">
      {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
