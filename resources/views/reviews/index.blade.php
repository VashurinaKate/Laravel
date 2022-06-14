@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Отзывы</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('reviews.create') }}" class="btn btn-sm btn-outline-secondary">Добавить отзыв</a>
            </div>
        </div>
    </div>
    @include('inc.messages')
    <div class="list-group">
        @forelse($reviews as $review)
            <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">{{ $review->username }}</h6>
                        <p class="mb-0 opacity-75">{{ $review->review }}</p>
                    </div>
                    <small class="opacity-50 text-nowrap">{{ $review->created_at }}</small>
                </div>
            </div>
        @empty
            <div>
                Отзывов нет
            </div>
        @endforelse
    </div>
@endsection
