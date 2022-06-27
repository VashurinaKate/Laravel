@extends('layouts.main')
@section('content')

<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Добро пожаловать на наш новостной сайт!</h1>
    </div>
    <a href="<?=route('about')?>">О нас</a>
    <a href="<?=route('categories')?>">Категории</a>
    <a href="<?=route('news.add')?>">Добавить новость</a>

    <a href="<?=route('reviews')?>">Отзывы</a>

    <a href="<?=route('agregator')?>">Получить данные из источника</a>

</div>

@endsection


