@extends('layouts.main')

@section('content')
@if (Auth::user())
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full dark:text-white">
            <h1 class="mb-5 text-black dark:text-white text-5xl">{{ __('layouts.tasks.create_header') }}</h1>
            {{ Form::model($task, ['url' => route('tasks.store'), 'class' => 'w-50']) }}
            <div class="flex flex-col">
                <div>
                    {{ Form::label('name', __('layouts.tasks.name')) }}
                </div>
                <div class="mt-2 text-black">
                    {{ Form::text('name') }}
                </div>

                <div>
                    {{ Form::label('description', __('layouts.tasks.description')) }}
                </div>
                <div class="mt-2 text-black">
                    {{ Form::text('description') }}
                </div>

                <div>
                    {{ Form::label('status_id', __('layouts.tasks.status')) }}
                </div>
                <div class="mt-2 text-black">
                    {{ Form::select('status_id', $statuses, null, ['placeholder' => '----------']) }}
                </div>
                
                <div>
                    {{ Form::label('assigned_to', __('layouts.tasks.executor')) }}
                </div>
                <div class="mt-2 text-black">
                    {{ Form::select('assigned_to_id', $users, null, ['placeholder' => '----------']) }}
                </div>

                <div>
                    {{ Form::label('labels', __('layouts.tasks.labels')) }}
                </div>
                <div class="mt-2 text-black">
                    {{ Form::select('labels[]', $labels, $task->labels, ['multiple' => true]) }}
                </div>

                <div class="mt-2">
                    {{ Form::submit(__('layouts.tasks.create'), ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@endif
@endsection