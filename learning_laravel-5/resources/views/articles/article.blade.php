<article data-article='{{ $article->id }}'> 
  <h2>
    <a href="{{ route('articles.show', [$article->id]) }}" > {{ $article->title }} </a>
  </h2>
  <p>{{ $article->body }} </p>
  <p> 
    {!! link_to_action('ArticlesController@edit', 'Edit', [$article->id], ['class' => 'btn btn-default', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
    {!! link_to_action('ArticlesController@destroy', 'Remove', [$article->id], ['class' => 'btn btn-warning', 'data-method' => 'delete', 'data-remote' => 'true', 'data-confirm' => 'Are you sure you want to delete' . $article->title .' ?']) !!}
  </p>
</article>  