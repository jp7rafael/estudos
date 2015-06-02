@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">About {{ $first }} {{ $last }}</div>

        <div class="panel-body">
          @if (count($names))
            <h3> Names </h3>
            <ul>
              @foreach ($names as $name)
                <li>{{ $name }} </li>
              @endforeach
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
