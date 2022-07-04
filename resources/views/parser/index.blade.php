@extends('layouts.main')
@section('title') Получить данные @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Полученные данные</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('userParser.create') }}" class="btn btn-sm btn-outline-secondary">Получить данные</a>
            </div>
        </div>
    </div>

    @include('inc.messages')

@endsection

