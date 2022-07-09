@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить источник</h1>
    </div>
    <div class="col-md-7 col-lg-8">
            @include('inc.messages')
        <form method="post" action="{{ route('admin.addResource') }}" class="needs-validation" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="link" class="form-label">Ссылка на источник</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><></span>
                        <input type="url" class="form-control" name="link" id="link" placeholder="url" value="{{ old('link') }}">
                        <div class="invalid-feedback">
                            Your url is required.
                        </div>
                    </div>
                </div>
                <div><button type="submit" class="btn btn-secondary">Отправить</button></div>
            </div>
        </form>

{{--            <form method="post" action="{{ route('admin.getData') }}" class="needs-validation" novalidate>--}}
{{--            @csrf--}}
{{--            <div class="row g-3">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <label for="name" class="form-label">Имя заказчика</label>--}}
{{--                    <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ old('name') }}">--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        Valid name is required.--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-sm-6">--}}
{{--                    <label for="phone" class="form-label">Номер телефона</label>--}}
{{--                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="phone" value="{{ old('phone') }}">--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        Valid phone is required.--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-sm-6">--}}
{{--                    <label for="email" class="form-label">E-mail</label>--}}
{{--                    <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{ old('email') }}">--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        Valid email is required.--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-12">--}}
{{--                    <label for="url" class="form-label">Ссылка на источник</label>--}}
{{--                    <div class="input-group has-validation">--}}
{{--                        <span class="input-group-text"><></span>--}}
{{--                        <input type="url" class="form-control" name="url" id="url" placeholder="url" value="{{ old('url') }}">--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            Your url is required.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div><button type="submit" class="btn btn-secondary">Отправить</button></div>--}}
{{--            </div>--}}
{{--        </form>--}}
    </div>

@endsection
