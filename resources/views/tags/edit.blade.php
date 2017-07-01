@extends('master')

@section('title', $tag->name)

@section('content')

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="{{ url('tags') }}">Back to Tags</a>
    <div class="page-header">
      <h1>Edit Tag</h1>
    </div>

    {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
      <div class="form-group">
        {{ Form::label('name', 'Tag :') }}
        {{ Form::text('name', null , array('class' => 'form-control')) }}
      </div>
      <div class="btn-group">
        {{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
      </div>
    {!! Form::close() !!}
  </div>
</div>

@stop
