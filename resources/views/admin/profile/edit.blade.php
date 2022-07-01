@extends('layouts.admin')
@section('content')

    <div class="col-md-7 col-lg-8">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">Редактировать профиль</h2>
        </div>
        @include('inc.messages')
        <form method="post" action="{{ route('admin.profile.update', ['profile' => $profile]) }}" class="needs-validation" novalidate>
            @csrf
            @method('put')
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" placeholder="" value="{{ $profile->name }}" name="name" disabled>
                    <div class="invalid-feedback">
                        Valid title is required.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="" value="{{ $profile->email }}" disabled>
                    <div class="invalid-feedback">
                        Valid author description is required.
                    </div>
                </div>

                <div class="col-sm-6">
                    Статус админа
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_admin" id="yes" value="1" @if($profile->is_admin === true) checked @endif>
                        <label class="form-check-label" for="yes">
                            Да
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_admin" id="no" value="0" @if($profile->is_admin === false) checked @endif>
                        <label class="form-check-label" for="no">
                            Нет
                        </label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary">Обновить</button>
                </div>
            </div>
        </form>
    </div>

@endsection
