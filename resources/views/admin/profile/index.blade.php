@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Профили</h1>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Статус админа</th>
            </tr>
            </thead>
            <tbody>
            @forelse($profiles as $profile)
                <tr>
                    <td>{{ $profile->id }}
                    <td>{{ $profile->name }}</td>
                    <td>{{ $profile->email }}</td>
                    <td>{{ $profile->is_admin }}</td>
                    <td>
                        <a href="{{ route('admin.profile.edit', ['profile' => $profile]) }}">Ред.</a> &nbsp;
                        <a href="" class="delete">Удалить</a>
                    </td>
                </tr>
            @empty
                <div>Профилей нет</div>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
