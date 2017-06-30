@extends('master')

@section('title', $category->name)

@section('content')

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="{{ url('categories') }}">Back to Categories</a>
    <div class="page-header">
      <h1>Edit Category</h1>
    </div>

    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
      <div class="form-group">
        {{ Form::label('name', 'Category :') }}
        {{ Form::text('name', null , array('class' => 'form-control')) }}
      </div>
      <div class="btn-group">
        {{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
      </div>
    {!! Form::close() !!}
  </div>
</div>

@stop
