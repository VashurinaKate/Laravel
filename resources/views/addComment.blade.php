@extends('layouts.main')
@section('content')

<div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Форма обратной связи</h4>
    @if($errors->any())
        @foreach($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('addComment') }}" class="needs-validation" novalidate>
        @csrf
        <div class="row g-3">
        <div class="col-sm-6">
            <label for="username" class="form-label">Имя пользователя</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{ old('username') }}">
            <div class="invalid-feedback">
            Valid username is required.
            </div>
        </div>

        <div class="col-12">
            <label for="comment" class="form-label">Комментарий</label>
            <div class="input-group has-validation">
            <span class="input-group-text"></></span>
            <textarea class="form-control" name="comment" id="comment" placeholder="Комментарий">{{ !!old('comment')}}</textarea>
            <div class="invalid-feedback">
                Your comment is required.
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary">Отправить</button>
    </form>
</div>

@endsection