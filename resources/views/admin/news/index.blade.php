@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
        </button>
    </div>
</div>

    <h2>Section title</h2>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Наименовнаие</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $newsItem)
                <tr>
                    <td>{{ $newsItem->id }}</td>
                    <td>{{ $newsItem->title }}</td>
                    <td>{{ $newsItem->author }}</td>
                    <td>{{ $newsItem->status }}</td>
                    <td>{{ $newsItem->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', ['news' => $newsItem]) }}">Ред.</a> &nbsp;
                        <a href="#">Удалить</a>
                    </td>
                </tr>
            @empty
            <div>Новостей нет</div>
            @endforelse
            </tbody>
        </table>
        {{ $news ->links() }}
    </div>
@endsection
