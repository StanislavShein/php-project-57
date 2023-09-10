@extends('layouts.main')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">{{ __('layouts.tasks.index_header') }}</h1>
            @if (Auth::user())
                <div>
                    <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('layouts.tasks.create')}}</a>
                </div>
            @endif
            <table class="mt-4">
                <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th>{{ __('layouts.tasks.id') }}</th>
                        <th>{{ __('layouts.tasks.status') }}</th>
                        <th>{{ __('layouts.tasks.name') }}</th>
                        <th>{{ __('layouts.tasks.creator') }}</th>
                        <th>{{ __('layouts.tasks.executor') }}</th>
                        <th>{{ __('layouts.tasks.created_at') }}</th>
                        @if (Auth::user())
                            <th>{{ __('layouts.tasks.actions') }}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr class="border-b border-dashed text-left">
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->status_id }}</td>
                        <td>
                            <a class="text-blue-600 hover:text-blue-900" href="/">{{ $task->name }}</a>
                        </td>
                        <td>{{ $task->created_by_id }}</td>
                        <td>{{ $task->assigned_to_id}}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>Удалить / Изменить</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 grid col-span-full">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</section>
@endsection