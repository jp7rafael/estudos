{!! Form::open(['url' => 'articles', 'data-remote' => 'true']) !!}        
  @include ('articles.form', ['subimtButtonText' => 'Add article'])
{!! Form::close() !!}
