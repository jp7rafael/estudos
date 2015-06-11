@include ('errors.list')
{!! Form::open(['url' => 'articles', 'data-remote' => 'true', 'id' => 'create-article']) !!}        
  @include ('articles.form', ['subimtButtonText' => 'Add article'])
{!! Form::close() !!}
