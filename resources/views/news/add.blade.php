@extends('layouts.main')
@section('title') Список новостей @parent @stop
@section('content')
<div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Добавть новость</h4>
    @include('inc.messages')

    <form method="post" action="{{ route('news.store') }}" class="needs-validation" novalidate>
        @csrf
        <div class="row g-3">
            <div class="col-sm-6">
                <label for="category_id" class="form-label">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($category->id === old('category_id')) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-6">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="" value="{{ old('title') }}" required>
                <div class="invalid-feedback">
                Valid title is required.
                </div>
            </div>

            <div class="col-sm-6">
                <label for="author" class="form-label">Автор</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="" value="{{ Auth::user()->name }}" required>
                <div class="invalid-feedback">
                    Valid author is required.
                </div>
            </div>

            <div class="col-sm-6">
                <label for="shortdescription" class="form-label">Краткое описание</label>
                <input type="text" class="form-control" name="shortdescription" id="shortdescription" placeholder="" value="{{ old('shortdescription') }}" required>
                <div class="invalid-feedback">
                    Valid short description is required.
                </div>
            </div>

        <div class="col-12">
            <label for="description" class="form-label">Описание</label>
            <div class="input-group has-validation">
                <span class="input-group-text"><></span>
                <textarea class="form-control" id="description" name="description" placeholder="Описание" required>{{ !!old('description') }}</textarea>
                    <div class="invalid-feedback">
                        Valid description is required.
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" style="margin-top: 30px;" class="btn btn-secondary">Отправить</button>
    </form>
</div>

@endsection
