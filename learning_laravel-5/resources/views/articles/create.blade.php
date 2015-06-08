@include ('errors.list')
{!! Form::open(['url' => 'articles', 'data-remote' => 'true']) !!}        
  @include ('articles.form_modal', ['subimtButtonText' => 'Add article'])
{!! Form::close() !!}
