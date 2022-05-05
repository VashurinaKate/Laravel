@extends('layouts.main')
@section('title') Список новостей @parent @stop
@section('content')
    <h3>Новости по категории</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($newsList as $news)
        <div class="col">
            <div class="card shadow-sm">
            <img src="{{ $news['image'] }}" alt="" style="width: 100px; height: 100px;">

            <div class="card-body">
                <strong><a href="{{ route('news.show', ['id' => $news['id']]) }}">{{ $news['title'] }}</a></strong>
                <p class="card-text">{{ $news['description'] }}</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('news.show', ['id' => $news['id']]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                </div>
                <small class="text-muted">Автор: {{ $news['author'] }}</small>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

