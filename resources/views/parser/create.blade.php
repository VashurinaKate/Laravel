@extends('layouts.main')
@section('content')

    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Получить данные</h4>
        @include('inc.messages')

        <form method="post" action="{{ route('parseData') }}" class="needs-validation" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="url" class="form-label">Ссылка на источник</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><></span>
                        <input type="url" class="form-control" name="url" id="url" placeholder="url" value="{{ old('url') }}">
                        <div class="invalid-feedback">
                            Your url is required.
                        </div>
                    </div>
                </div>
                <div><button type="submit" class="btn btn-secondary">Отправить</button></div>
            </div>
        </form>
    </div>

@endsection
