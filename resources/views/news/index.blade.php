{{--@extends('layouts.main')--}}
@section('title') Список новостей @parent @stop
@section('content')
    <h3>Новости по категории</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($news as $newsItem)
        <div class="col">
            <div class="card shadow-sm">
{{--            <img src="{{ $news->image }}" alt="" style="width: 100px; height: 100px;">--}}

            <div class="card-body">
                <strong><a href="{{ route('news.show', ['id' => $newsItem->id]) }}">{{ $news['title'] }}</a></strong>
                <p class="card-text">{{ $newsItem->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('news.show', ['id' => $newsItem->id]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
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
@endsection

