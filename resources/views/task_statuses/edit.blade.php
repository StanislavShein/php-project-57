@extends('layouts.main')

@section('content')
@if (Auth::user())
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full dark:text-white">
            <h1 class="mb-5">{{ __('layouts.task_statuses.edit_header') }}</h1>
            {{ Form::model($taskStatus, ['route' => ['task_statuses.update', $taskStatus], 'method' => 'PATCH', 'class' => 'w-50']) }}
            <div class="flex flex-col">
                <div>
                    {{ Form::label('name', __('layouts.task_statuses.name')) }}
                </div>
                <div class="mt-2 text-black">
                    {{ Form::text('name') }}
                </div>
                <div class="mt-2">
                    {{ Form::submit(__('layouts.task_statuses.edit'), ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@endif
@endsection