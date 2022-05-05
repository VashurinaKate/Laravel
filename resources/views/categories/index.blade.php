@extends('layouts.main')
@section('content')
    <h3>Категории</h3>
    <div class="list-group">
        @foreach($categoriesList as $categories)
        <a href="{{ route('news') }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">{{ $categories['title'] }}</h6>
                <p class="mb-0 opacity-75">{{ $categories['created_at'] }}</p>
            </div>
            <small class="opacity-50 text-nowrap">now</small>
            </div>
        </a>
        @endforeach
    </div>
@endsection
