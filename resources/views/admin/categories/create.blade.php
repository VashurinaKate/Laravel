@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
    </div>

    <div class="table-responsive">
        <h3>Форма добавления</h3>
        @include('inc.messages')
        <form method="post" action="{{ route('admin.categories.store') }}" class="needs-validation" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" placeholder="" value="{{ old('title') }}" name="title" required>
                    <div class="invalid-feedback">
                        Valid title is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Описание</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><></span>
                        <textarea class="form-control" name="description" id="description" placeholder="Описание" required>{{ !!old('description') }}</textarea>
                        <div class="invalid-feedback">
                            Your description is required.
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection
