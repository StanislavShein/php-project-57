@extends('layouts.main')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">Статусы</h1>
            <div>
                <a href="{{ route('task_statuses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Создать статус</a>
            </div>
            <table class="mt-4">
                <thead class="border-b-2 border-dashed text-left">
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taskStatuses as $taskStatus)
                        <tr class="border-b border-dashed text-left">
                            <td>{{ $taskStatus->id }}</td>
                            <td>{{ $taskStatus->name }}</td>
                            <td>{{ $taskStatus->created_at }}</td>
                            <td>
                                <a data-confirm="Вы уверены?" class="text-red-600 hover:text-red-900" href="{{ route('task_statuses.destroy', $taskStatus) }}" data-method="delete" rel="nofollow" value="{{ csrf_token() }}">Удалить</a>
                                <a class=" text-blue-600 hover:text-blue-900" href="{{ route('task_statuses.edit', $taskStatus) }}">Изменить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection