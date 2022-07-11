@extends('layouts.main')
@section('title') Список новостей @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Новости по категории {{ $category->title }}</h2>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($news as $newsItem)
        <div class="col">
            <div class="card shadow-sm">
                @if($newsItem->image)
                    <img src="{{ Storage::disk('upload')->url($newsItem->image) }}" alt="" style="width: 100px; height: 100px;">
                @endif
                <div class="card-body">
                    <strong><a href="{{ route('news.show', ['slug' => $newsItem->slug]) }}">{{ $newsItem->title }}</a></strong>
                    <p class="card-text">{{ $newsItem->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('news.show', ['slug' => $newsItem->slug]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                    </div>
                    <small class="text-muted">Автор: {{ $newsItem->author }}</small>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div>Новостей в данной категории нет</div>
        @endforelse
    </div>
    {{ $news ->links() }}
@endsection

