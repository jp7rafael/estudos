<article>
  <h1>{{ $article['title'] }} </h1>
  <p>{{ $article['body'] }} </p>
</article>
<h5>Tags:</h5>
<ul>
@foreach ($tags as $tag)
  <li>{{ $tag['name'] }}</li>
@endforeach
</ul>
