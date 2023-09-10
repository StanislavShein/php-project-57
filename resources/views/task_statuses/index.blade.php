@extends('layouts.main')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">{{ __('layouts.task_statuses.index_header') }}</h1>
            @if (Auth::user())
                <div>
                    <a href="{{ route('task_statuses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('layouts.task_statuses.create')}}</a>
                </div>
            @endif
            <table class="mt-4">
                <thead class="border-b-2 border-dashed text-left">
                    <tr>
                        <th>{{ __('layouts.task_statuses.id')}}</th>
                        <th>{{ __('layouts.task_statuses.name')}}</th>
                        <th>{{ __('layouts.task_statuses.created_at')}}</th>
                        @if (Auth::user())
                            <th>{{ __('layouts.task_statuses.actions')}}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taskStatuses as $taskStatus)
                        <tr class="border-b border-dashed text-left">
                            <td>{{ $taskStatus->id }}</td>
                            <td>{{ $taskStatus->name }}</td>
                            <td>{{ $taskStatus->created_at }}</td>
                            @if (Auth::user())
                                <td>
                                    <a href="{{ route('task_statuses.destroy', $taskStatus) }}" data-confirm="{{ __('layouts.task_statuses.confirm') }}" class="text-red-600 hover:text-red-900" data-method="delete" rel="nofollow">{{ __('layouts.task_statuses.delete')}}</a>
                                    <a href="{{ route('task_statuses.edit', $taskStatus) }}" class=" text-blue-600 hover:text-blue-900">{{ __('layouts.task_statuses.edit')}}</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 grid col-span-full">
                {{ $taskStatuses->links() }}
            </div>
        </div>
    </div>
</section>
@endsection