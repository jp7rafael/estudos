  <article>
    <h1>{{ $article->title }} </h1>
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