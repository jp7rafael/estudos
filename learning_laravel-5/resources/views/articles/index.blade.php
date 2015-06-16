@extends('app')

@section('content')
  @include('shared.modal')
  <div class="panel-heading">Articles</div>

  <div class="panel-body">
    {!! link_to_route('articles.create', 'New article', null, ['class' => 'btn btn-primary btn-lg', 'id'=> 'new-button', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
    @foreach ($articles as $article)
      @include ('articles.article')
        <div>
        {!! link_to_action('ArticlesEmailController@create', 'Send to me', [$article->id], ['class' => 'btn btn-default', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
        {!! link_to_action('ArticlesController@edit', 'Edit', [$article->id], ['class' => 'btn btn-default', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
        {!! link_to_action('ArticlesController@destroy', 'Remove', [$article->id], ['class' => 'btn btn-warning', 'data-method' => 'delete', 'data-remote' => 'true', 'data-confirm' => 'Are you sure you want to delete' . $article->title .' ?']) !!}
      </div>
    @endforeach 
  </div>
@endsection

@section('footer')
  <script type="text/javascript">
      $('[data-method=delete]').on('ajax:success', function(e, data, status, xhr){
        $(e.target).closest('article').fadeOut();
      });
      
      $('[data-toggle=modal]').on( "click", function() {
        var url = $(this).attr('href');
        $('.modal-content').load(url, function(response, status, xhr) {});
      });

      $('#myModal').on('ajax:success', function(e, data, status, xhr){
        $('#myModal').modal('hide');
          var article_id = $(data).data('article');
          var article_data_id = '[data-article=' + article_id + ']';
          if ($(article_data_id).length)//update
          {
            $(article_data_id).html(data);
          }
          else//create
          {
            $('#new-button').after(data);
          }
      });

      $("[data-action=show]").on('ajax:success', function(e, data, status, xhr){
        $('.modal-content').html(data);
      });
  </script>
@endsection
