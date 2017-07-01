@extends('master')

@section('title', 'Create')

@section('stylesheets')
  {{ Html::style('css/select2.min.css') }}
@stop

@section('content')

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="{{ url('/') }}">Back to home</a>
    <div class="page-header">
      <h1>Create post</h1>
    </div>
    {!! Form::open(['route' => 'posts.store']) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title :') }}
        {{ Form::text('title', null , array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('tags', 'Tags :') }}
        {!! Form::select('tags', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple', 'name' => 'tags[]']) !!}﻿
      </div>

      <div class="form-group">
        {!! Form::label('category_id', 'Category :') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}﻿
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
        {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
      </div>
    {!! Form::close() !!}
  </div>
</div>

@stop

@section('scripts')
  {{ Html::script('/js/select2.full.min.js') }}

  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>
@stop
