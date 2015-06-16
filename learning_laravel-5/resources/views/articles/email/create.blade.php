<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Send {{ $article->title }} by e-mail</h4>
</div>
{!! Form::open(['url' => route('articles.email.send', $article->id), 'data-remote' => 'true']) !!}        
  <div class="modal-body">
    <div class='form-group'>
    @include ('errors.list')
      {!! Form::label('email', 'Email:') !!}
      {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    {!! Form::submit('Send me by e-mail', ['class' => 'btn btn-primary', 'data-submit' => 'modal']) !!}
  </div>
{!! Form::close() !!} 
