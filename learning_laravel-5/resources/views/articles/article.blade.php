<article data-article='{{ $article->id }}' class='row'> 
  <h2>
    <a href="{{ route('articles.show', [$article->id]) }}" data-remote='true' data-action='show' data-toggle='modal', data-target='#myModal' > {{ $article->title }} </a>
  </h2>
  <p>

  {{ $article->body }} 
  </p>
</article>  

@section('footer')
  @parent
  <script type='text/javascript'>
        (function() {
          $( document ).ready(function() {
            var flickerAPI = 'http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?';
            $.getJSON( flickerAPI, {
              tags: "{{ implode(' ', $article->tags()->lists('name')) }}",  
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