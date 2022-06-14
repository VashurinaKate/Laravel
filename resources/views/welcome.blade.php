@extends('layouts.main')
@section('content')

<div>
    <h1>Добро пожаловать на наш новостной сайт!</h1>
    <a href="<?=route('about')?>">О нас</a>
    <a href="<?=route('categories')?>">Категории</a>
    <a href="<?=route('news.add')?>">Добавить новость</a>

    <a href="<?=route('reviews')?>">Отзывы</a>

    <a href="<?=route('agregator')?>">Получить данные из источника</a>

</div>

@endsection


