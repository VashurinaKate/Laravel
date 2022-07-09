@extends('layouts.admin')
@section('content')

    <div class="col-md-7 col-lg-8">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">Редактировать новость</h2>
        </div>
        @include('inc.messages')
        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            @method('put')
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="category_id" class="form-label">Категория</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if($category->id === $news->category_id) selected @endif>{{ $category->title }}</option>
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
                        <input class="form-check-input" type="radio" name="status" id="draft" value="draft" @if($news->status === 'draft') checked @endif>
                        <label class="form-check-label" for="draft">
                            Draft
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="active" value="active" @if($news->status === 'active') checked @endif>
                        <label class="form-check-label" for="active">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="blocked" value="blocked" @if($news->status === 'blocked') checked @endif>
                        <label class="form-check-label" for="blocked">
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

                <div class="col-sm-6">
                    <label for="image" class="form-label">Изображение</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @if($news->image)
                        <img src="{{ Storage::url($news->image) }}" alt="" style="width: 350px;">
                    @endif
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
                <div>
                    <button type="submit" class="btn btn-success">Отправить</button>
                </div>
            </div>
        </form>
    </div>

{{--    @push('js')--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector("#description"))
            .catch(error => {
                console.error(error);
            });
    </script>
{{--    @endpush--}}
@endsection


