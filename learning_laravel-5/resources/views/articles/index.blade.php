@extends('app')

@section('content')
  @include('shared.modal')
  <div class="panel-heading">Articles</div>

  <div class="panel-body">
    {!! link_to_route('articles.create', 'New article', null, ['class' => 'btn btn-primary btn-lg', 'id'=> 'new-button', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
    @foreach ($articles as $article)
      @include ('articles.article')
    @endforeach
    <br /><br /><br /> 
    {!! link_to_route('articles.seed', 'Automatic seed', null, ['class' => 'btn btn-primary btn-lg', 'id'=> 'seed-button']) !!}
  </div>
@endsection

@section('footer')
  <script type="text/javascript">
      $('[data-method=delete]').on('ajax:success', function(e, data, status, xhr){
        debugger;
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
