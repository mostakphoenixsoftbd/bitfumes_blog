@extends('master')

@section('title', $post->title)

@section('content')

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="{{ url('posts') }}">Back to posts</a>

    <div class="page-header">
      <h1>{{ $post->title }}</h1>
    </div>

    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">@</span>
      <input type="text" class="form-control" placeholder="{{ $post->slug }}" aria-describedby="basic-addon1">
    </div>
    <br>
      <p class="lead">
        {{ $post->body }}
      </p>
    <div class="btn-group">
      <a class="btn btn-success" href="{{ route('posts.edit',$post->id) }}">Edit</a>
    </div>
    <div class="btn-group">
      {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
