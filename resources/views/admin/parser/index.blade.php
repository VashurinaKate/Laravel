@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список источников</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.parser.create') }}" class="btn btn-sm btn-outline-secondary">Добавить источник</a>
                <a href="{{ route('admin.parseNews') }}" class="btn btn-sm btn-outline-success">Парсинг новостей</a>
            </div>
        </div>
    </div>
    @include('inc.messages')

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Ссылка на источник</th>
                </tr>
            </thead>
            <tbody>
                @forelse($resources as $resource)
                    <tr>
                        <td>{{ $resource->id }}
                        <td>{{ $resource->link }}</td>
                        <td>
                            <a href="javascript:;" class="delete" rel="{{ $resource->id }}">Удалить</a>
                        </td>
                    </tr>
                @empty
                    <div>Источников нет</div>
                @endforelse
            </tbody>
        </table>
        {{ $resources ->links() }}
    </div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            const elToDelete = document.querySelectorAll(".delete");
            elToDelete.forEach((value, key) => {
                value.addEventListener('click', function () {
                    const id = this.getAttribute('rel');
                    if(confirm(`Подтвердите удаление записи с #ID ${id} ?`)) {
                        send('/admin/parser/' + id).then(() => {
                            location.reload();
                        });
                    };
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();

            return result.ok;
        }
    </script>

@endsection


