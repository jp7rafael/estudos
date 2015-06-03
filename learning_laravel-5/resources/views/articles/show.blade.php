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
    @unless ($article->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
        @foreach ($article->tags as $tag)
          <li>{{ $tag->name }}</li>
        @endforeach
      </ul>
    @endif
  </div>
@endsection