@extends('layouts.main')

@section('content')

        <section class="bg-white dark:bg-gray-900">
            <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
                                <div class="grid col-span-full">
    <h1 class="mb-5">Статусы</h1>

    <div>
            </div>

    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Дата создания</th>
                            </tr>
        </thead>
                    <tr class="border-b border-dashed text-left">
                <td>1</td>
                <td>новая</td>
                <td>26.08.2023</td>
                <td>
                                                        </td>
            </tr>
                    <tr class="border-b border-dashed text-left">
                <td>2</td>
                <td>завершена</td>
                <td>26.08.2023</td>
                <td>
                                                        </td>
            </tr>
                    <tr class="border-b border-dashed text-left">
                <td>3</td>
                <td>выполняется</td>
                <td>26.08.2023</td>
                <td>
                                                        </td>
            </tr>
                    <tr class="border-b border-dashed text-left">
                <td>4</td>
                <td>в архиве</td>
                <td>26.08.2023</td>
                <td>
                                                        </td>
            </tr>
            </table>
    
</div>
            </div>
        </section>

@endsection