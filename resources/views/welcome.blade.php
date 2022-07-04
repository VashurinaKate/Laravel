@extends('layouts.main')
@section('content')

<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Добро пожаловать на наш новостной сайт!</h1>
    </div>

    <ul class="list-group">
        <a href="{{ route('about') }}" class="list-group-item list-group-item-action list-group-item-info">О нас</a>
        <a href="{{ route('categories') }}" class="list-group-item list-group-item-action list-group-item-info">Категории</a>
        @auth
            <a href="{{ route('news.add') }}" class="list-group-item list-group-item-action list-group-item-info">Добавить новость</a>
            <a href="{{ route('userParser') }}" class="list-group-item list-group-item-action list-group-item-info">Получить данные из источника</a>
        @endauth
        <a href="{{ route('reviews') }}" class="list-group-item list-group-item-action list-group-item-info">Отзывы</a>
        <a href="{{ route('account') }}" class="list-group-item list-group-item-action list-group-item-primary">Аккаунт</a>

    </ul>
</div>

@endsection


