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
            <h1 class="mb-5 text-black dark:text-white text-5xl">{{ __('layouts.labels.index_header') }}</h1>
            @auth()
                <div>
                    <a href="{{ route('labels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('layouts.labels.create')}}</a>
                </div>
            @endauth
            <table class="mt-4">
                <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th>{{ __('layouts.labels.id') }}</th>
                        <th>{{ __('layouts.labels.name') }}</th>
                        <th>{{ __('layouts.labels.description') }}</th>
                        <th>{{ __('layouts.labels.created_at') }}</th>
                        @auth()
                            <th>{{ __('layouts.labels.actions')}}</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach ($labels as $label)
                        <tr class="border-b border-dashed text-left">
                            <td>{{ $label->id }}</td>
                            <td>{{ $label->name }}</td>
                            <td>{{ $label->description }}</td>
                            <td>{{ date_format($label->created_at, 'd.m.Y') }}</td>
                            @auth()
                                <td>
                                    <a href="{{ route('labels.destroy', $label) }}" data-confirm="{{ __('layouts.labels.confirm') }}" class="text-red-600 hover:text-red-900" data-method="delete" rel="nofollow">{{ __('layouts.labels.delete')}}</a>
                                    <a href="{{ route('labels.edit', $label) }}" class=" text-blue-600 hover:text-blue-900">{{ __('layouts.labels.edit')}}</a>
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 grid col-span-full">
                {{ $labels->links() }}
            </div>
        </div>
    </div>
</section>
@endsection