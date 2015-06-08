@extends('app')

@section('content')
  <div class="panel-heading">Articles</div>

  <div class="panel-body">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
      New article
    </button>
  <a  href="{{ action('ArticlesController@create') }}" >New article</a>
    @foreach ($articles as $article)
      <article> 
        <h2>
          <a href="{{ action('ArticlesController@show', [$article->id]) }}" > {{ $article->title }} </a>
        </h2>
        <p>{{ $article->body }} </p>
        <p> 
          {!! link_to_action('ArticlesController@edit', 'Edit', [$article->id], ['class' => 'btn btn-default']) !!}
          {!! link_to_action('ArticlesController@destroy', 'Remove', [$article->id], ['class' => 'btn btn-warning destroy-btn', 'data-method' => 'delete', 'data-remote' => 'true', 'data-confirm' => 'Are you sure you want to delete' . $article->title .' ?']) !!}
        </p>
      </article>
    @endforeach
  </div>
@endsection

@section('footer')
  <script type="text/javascript">
    $('.destroy-btn').bind('ajax:success', function(e, data, status, xhr){
      $(e.target).closest('article').fadeOut();
    });
  </script>
@endsection
