<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">{{ $article->title }}</h4>
</div>
<div class="modal-body">
  <article> 
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