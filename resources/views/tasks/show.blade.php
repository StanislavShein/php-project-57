@extends('layouts.main')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h2 class="mb-5">{{ __('layouts.tasks.show_header') }} : {{ $task->name }}<a href="{{ route('tasks.edit', $task) }}">&#9881;</a></h2>
            <p><span class="font-black">{{ __('layouts.tasks.name') }} : </span> {{ $task->name }}</p>
            <p><span class="font-black">{{ __('layouts.tasks.status') }} : </span> {{ $task->status->name }}</p>
            <p><span class="font-black">{{ __('layouts.tasks.description') }} : </span> {{ $task->description }}</p>
        </div>
    </div>
</section>
@endsection
