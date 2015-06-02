@extends('app')

@section('content')
  <div class="panel-heading">Create an article</div>

  <div class="panel-body">
    @include ('errors.list')
    {!! Form::open(['url' => 'articles']) !!}        
      @include ('articles.form', ['subimtButtonText' => 'Add article'])
    {!! Form::close() !!}
  </div>
@endsection
