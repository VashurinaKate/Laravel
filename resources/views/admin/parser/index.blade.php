@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Загрузки</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.parser.create') }}" class="btn btn-sm btn-outline-secondary">Получить данные</a>
            </div>
        </div>
    </div>
    @include('inc.messages')

{{--    {{ $data }}--}}
{{--    <div class="card mb-3" style="max-width: 540px;">--}}
{{--        <div class="row g-0">--}}
{{--            <div class="col-md-4">--}}
{{--                <img src="{{ $data['image'] }}" class="img-fluid rounded-start" alt="...">--}}
{{--            </div>--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">{{ $data['title'] }}</h5>--}}
{{--                    <p class="card-text">{{ $data['description'] }}</p>--}}
{{--                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    @forelse($data['news'] as $news)--}}
{{--        <div>--}}
{{--            {{ $news->title }}--}}
{{--        </div>--}}
{{--    @empty--}}
{{--        <div>Новостей нет</div>--}}
{{--    @endforelse--}}
@endsection

