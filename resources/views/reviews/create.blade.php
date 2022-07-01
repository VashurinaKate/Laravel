@extends('layouts.main')
@section('content')

    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Оставить отзыв</h4>
        @include('inc.messages')
        <form method="post" action="{{ route('reviews.store') }}" class="needs-validation" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="username" class="form-label">Имя пользователя / email</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{ Auth::user()->email }}">
                </div>

                <div class="col-12">
                    <label for="comment" class="form-label">Комментарий</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><></span>
                        <textarea class="form-control" name="review" id="review" placeholder="Комментарий">{{ !!old('review')}}</textarea>
                    </div>
                </div>
                <div><button type="submit" class="btn btn-secondary">Отправить</button></div>
            </div>
        </form>
    </div>

@endsection
