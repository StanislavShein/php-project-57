@extends('layouts.main')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        @if(session('success'))
            <div class="alert alert-success text-black dark:text-white">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-black dark:text-white">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid col-span-full dark:text-white">
            <h1 class="mb-5 text-black dark:text-white text-5xl">{{ __('layouts.tasks.index_header') }}</h1>
            <div class="w-full flex items-center">
                <div>
                    {{Form::open(['route' => 'tasks.index', 'method' => 'GET'])}}
                        <div class="flex">
                            <div>
                                {{Form::select('filter[status_id]', $statuses, $filter['status_id'] ?? null, ['placeholder' => __('layouts.tasks.placeholder_status')])}}
                            </div>
                            <div>
                                {{Form::select('filter[created_by_id]', $users, $filter['created_by_id'] ?? null, ['placeholder' => __('layouts.tasks.placeholder_created_by')])}}
                            </div>
                            <div>
                                {{Form::select('filter[assigned_to_id]', $users, $filter['assigned_to_id'] ?? null, ['placeholder' => __('layouts.tasks.placeholder_assigned_to')])}}
                            </div>
                            <div>
                                {{Form::submit(__('layouts.tasks.apply'), ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2'])}}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                @if (Auth::user())
                    <div class="ml-auto">
                        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('layouts.tasks.create')}}</a>
                    </div>
                @endif
            </div>
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
                        <td>{{ $task->status->name }}</td>
                        <td>
                            <a class="text-blue-600 hover:text-blue-900" href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a>
                        </td>
                        <td>{{ $task->creator->name }}</td>
                        <td>{{ $task->executor->name ?? '' }}</td>
                        <td>{{ date_format($task->created_at, 'd.m.Y') }}</td>
                        @if (Auth::user())
                            <td>
                                @if (Auth::user()->id === $task->creator->id)
                                    <a href="{{ route('tasks.destroy', $task->id) }}" data-confirm="{{ __('layouts.tasks.confirm') }}" class="text-red-600 hover:text-red-900" data-method="delete" rel="nofollow">{{ __('layouts.tasks.delete')}}</a>
                                @endif
                                    <a href="{{ route('tasks.edit', $task) }}" class=" text-blue-600 hover:text-blue-900">{{ __('layouts.tasks.edit')}}</a>
                            </td>
                        @endif
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