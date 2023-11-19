@extends('layouts.main')

@section('content')
@auth()
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5 text-black dark:text-white text-5xl">{{ __('layouts.labels.create_header') }}</h1>
            {{ Form::model($label, ['url' => route('labels.store'), 'class' => 'w-50']) }}
            <div class="flex flex-col dark:text-white">
                <div>
                    {{ Form::label('name', __('layouts.labels.name')) }}
                </div>
                <div class="mt-2 text-black">
                    {{ Form::text('name', '', ['class' => 'form-control rounded border-gray-300 w-1/3']) }}
                </div>
                <div>
                    @if ($errors->any())
                        {{ $errors->first('name') }}
                    @endif
                </div>

                <div>
                    {{ Form::label('description', __('layouts.labels.description')) }}
                </div>
                <div class="mt-2 text-black">
                    {{ Form::textarea('description', '', ['class' => 'form-control rounded border-gray-300 w-1/3 h-32', 'cols' => '50', 'rows' => '10']) }}
                </div>
                <div>
                    @if ($errors->any())
                        {{ $errors->first('description') }}
                    @endif
                </div>

                <div class="mt-2">
                    {{ Form::submit(__('layouts.labels.creating'), ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@endauth
@endsection