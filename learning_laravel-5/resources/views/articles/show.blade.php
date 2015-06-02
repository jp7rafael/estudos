@extends('app')


@section('content')
  <div class="panel-heading">Article</div>

  <div class="panel-body">
    <article> 
      <h2>
        {{ $article->title }}
      </h2>
      <p>{{ $article->body }} </p>
    </article>
  </div>
@endsection