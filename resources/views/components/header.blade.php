<header class="fixed w-full relative">
    <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900 shadow-md">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <a href="{{ route('main') }}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ __('layouts.header.appname') }}</span>
            </a>
            <div class="flex items-center lg:order-2">
                @if (Route::has('login'))
                @auth
                    <a href="{{ route('logout') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-method="post" rel="nofollow">{{ __('layouts.header.logout') }}</a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('layouts.header.login') }}</a>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">{{ __('layouts.header.registration') }}</a>
                @endif
                @endauth
                @endif
            </div>
            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{ route('tasks.index') }}" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">{{ __('layouts.header.tasks') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('task_statuses.index') }}" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">{{ __('layouts.header.statuses') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('labels.index') }}" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">{{ __('layouts.header.labels') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>