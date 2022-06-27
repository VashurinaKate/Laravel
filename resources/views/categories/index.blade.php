@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Категории</h2>
    </div>
    @include('inc.messages')

    <div class="list-group">
        @forelse($categories as $category)
        <a href="{{ route('news', ['id' => $category->id]) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">{{ $category->title }}</h6>
                <p class="mb-0 opacity-75">{{ $category->created_at }}</p>
            </div>
            <small class="opacity-50 text-nowrap">now</small>
            </div>
        </a>
        @empty
            <div>
                Записей нет
            </div>
        @endforelse
    </div>
@endsection
