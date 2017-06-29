@extends('master')

@section('title', 'Edit')

@section('main')

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="{{ url('posts') }}">Back to posts</a>
    <div class="page-header">
      <h1>Edit post</h1>
    </div>
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title :') }}
        {{ Form::text('title', null , array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('slug', 'Slug :') }}
        {{ Form::text('slug', null , array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('body', 'Body :') }}
        {{ Form::textarea('body', null , array('class' => 'form-control')) }}
      </div>

      <div class="btn-group">
        {{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
      </div>

      <div class="btn-group">
        <a class='btn btn-danger' href="{{ route('posts.show',$post->id) }}">Cancel</a>
      </div>
    {!! Form::close() !!}
  </div>
</div>

@stop
