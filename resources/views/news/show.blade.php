@extends('layouts.main')
@section('content')
<hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">{{ $news->title }} <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">{{ $news->description }}</p>
        <strong>Author:</strong>
        {{ $news->author }}
      </div>
      <div class="col-md-5">
        <img src="{{ $news->image }}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

      </div>
    </div>

<hr class="featurette-divider">

@endsection
