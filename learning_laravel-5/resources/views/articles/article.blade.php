<article data-article='{{ $article->id }}' class='md-12'> 
<div class='row' >
  <h2>
    <a href="{{ route('articles.show', [$article->id]) }}" data-remote='true' data-action='show' data-toggle='modal', data-target='#myModal' > {{ $article->title }} </a>
  </h2>
  <p>

  {{ $article->body }} 
  </p>
</div>
<br />
  <div class='row' >
  {!! link_to_action('ArticlesEmailController@create', 'Send to me', [$article->id], ['class' => 'btn btn-default', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
        {!! link_to_action('ArticlesController@edit', 'Edit', [$article->id], ['class' => 'btn btn-default', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
        {!! link_to_action('ArticlesController@destroy', 'Remove', [$article->id], ['class' => 'btn btn-warning', 'data-method' => 'delete', 'data-remote' => 'true', 'data-confirm' => 'Are you sure you want to delete' . $article->title .' ?']) !!} 
  </div>
</article>
@section('footer')
  @parent
  <script type='text/javascript'>
        (function() {
          $( document ).ready(function() {
            var flickerAPI = 'http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?';
            $.getJSON( flickerAPI, {
              tags: "{{ implode(' ', $article->tags()->lists('name')->all()) }}",  
              tagmode: 'any',
              format: 'json'
            })
              .done(function( data ) {
                var img_url = data.items[0].media.m;
                var img = $( "<img align='left'>" ).attr( 'src', img_url );
                var article_id = {{ $article->id }}
                $('[data-article=' + article_id + ']').find('p:first').prepend(img);
              });
            });
          })();
  </script>
@endsection