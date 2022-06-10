@extends('layouts.admin')
@section('content')

    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Редактировать новость</h4>
        @include('inc.messages')
        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" class="needs-validation" novalidate>
            @csrf
            @method('put')
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="category_id" class="form-label">Категория</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if($category->id === $news->category_id)) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-6">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" placeholder="" value="{{ $news->title }}" name="title" required>
                    <div class="invalid-feedback">
                        Valid title is required.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="author" class="form-label">Автор</label>
                    <input type="text" class="form-control" name="author" id="author" placeholder="" value="{{ $news->author }}" required>
                    <div class="invalid-feedback">
                        Valid author description is required.
                    </div>
                </div>

                <div class="col-sm-6">
                    Статус
                    <div class="form-check">
                        <input @if($news->status === 'draft') checked @endif class="form-check-input" type="radio" name="draft" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Draft
                        </label>
                    </div>
                    <div class="form-check">
                        <input @if($news->status === 'active') checked @endif class="form-check-input" type="radio" name="active" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input @if($news->status === 'blocked') checked @endif class="form-check-input" type="radio" name="blocked" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Blocked
                        </label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="short" class="form-label">Краткое описание</label>
                    <input type="text" name="shortdescription" class="form-control" id="short" placeholder="" value="{{ $news->shortdescription }}" required>
                    <div class="invalid-feedback">
                        Valid short description is required.
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Описание</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><></span>
                        <textarea class="form-control" name="description" id="description" placeholder="Описание" required>{{ $news->description }}</textarea>
                        <div class="invalid-feedback">
                            Your description is required.
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary">Отправить</button>
            </div>
        </form>
    </div>

@endsection
