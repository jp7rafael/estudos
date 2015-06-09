<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">{{ $subimtButtonText }}</h4>
</div>
<div class="modal-body">
  <div class='form-group'>
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::label('body', 'Text:') !!}
    {!! Form::textArea('body', null, ['class' => 'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::label('published_at', 'Plublish On:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  {!! Form::submit($subimtButtonText, ['class' => 'btn btn-primary', 'data-submit' => 'modal']) !!}
</div>

<script type="text/javascript">
$('select').select2({
  placeholder: 'Choose a tag',
  tags: true
});
</script>