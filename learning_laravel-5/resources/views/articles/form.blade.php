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
<div class='form-group'>
  {!! Form::submit($subimtButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
  <script type="text/javascript">
  $('select').select2({
    placeholder: 'Choose a tag',
    tags: true
  });
  </script>
@endsection
