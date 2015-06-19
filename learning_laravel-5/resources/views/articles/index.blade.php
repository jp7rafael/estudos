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
        function successAlert(element, message)
        {
          $(element).removeClass('alert-success').addClass('alert-danger');
          showAlert(messge);
        }

        function errorAlert(element, message)
        {
          $(element).removeClass('alert-success').addClass('alert-danger');
          showAlert(messge);
        }

        function showAlert(element, messge)
        {
          $(element).show().find('ul').html(message);
        }

      $('[data-method=delete]').on('ajax:success', function(e, data, status, xhr){
        $(e.target).closest('article').fadeOut();
          successAlert('#alert-box', 'Your article was removed with success');
      });

      $('[data-method=delete]').on('ajax:error', function(e, data, status, xhr){
          errorAlert('#alert-box', "Ops... You can't remove this article " + data.responseText);
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
            successAlert('#alert-box', 'Your article was updated with success');
          }
          else//create
          {
            $('#new-button').after(data);
            successAlert('#alert-box', 'Your article was created with success');
          }
      });

      $('#myModal').on('ajax:success', function(e, data, status, xhr){
           errorAlert('#articleFormErrors', 'Ops...');       
      });

      $("[data-action=show]").on('ajax:success', function(e, data, status, xhr){
        $('.modal-content').html(data);
      });
  </script>
@endsection
