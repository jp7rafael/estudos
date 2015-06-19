<div id='articleFormErrors' class="alert alert-danger alert-dismissible" role="alert" data-hide='true' style='display: none;'>
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>