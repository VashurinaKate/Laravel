@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
        </button>
    </div>
    </div>

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

    <h2>Section title</h2>
    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        @include('inc.messages')

        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Наименовнаие</th>
            <th scope="col">Описание</th>
            <th scope="col">Дата добавления</th>
            <th scope="col">Управление</th>
        </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }} ({{ $category->news_count }})</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Ред.</a> &nbsp;
                        <a href="#">Удалить</a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4">Записей нет</td>
                </tr>
            @endforelse
        </tbody>
    </table>
        {{ $categories->links() }}
    </div>
@endsection
