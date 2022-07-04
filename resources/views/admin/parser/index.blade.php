@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Загрузки</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.parser.create') }}" class="btn btn-sm btn-outline-secondary">Получить данные</a>
            </div>
        </div>
    </div>
    @include('inc.messages')

    <div class="row">
        @forelse($parsedNews as $newsItem)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $newsItem->title }}</h5>
                            <p class="card-text">{{ $newsItem->description }}</p>
                            <a href="{{ $newsItem->link }}" target="_blank" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
        @empty
            <div>Новостей нет</div>
        @endforelse
    </div>
@endsection

