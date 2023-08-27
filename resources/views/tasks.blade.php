@extends('layouts.main')

@section('content')

        <section class="bg-white dark:bg-gray-900">
            <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
                                <div class="grid col-span-full">
    <h1 class="mb-5">Задачи</h1>

    <div class="w-full flex items-center">
        <div>
            <form method="GET" action="https://php-task-manager-ru.hexlet.app/tasks" accept-charset="UTF-8" class="">
            <div class="flex">
                <div>
                    <select class="rounded border-gray-300" name="filter[status_id]"><option selected="selected" value="">Статус</option><option value="1">новая</option><option value="2">завершена</option><option value="3">выполняется</option><option value="4">в архиве</option></select>
                </div>
                <div>
                    <select class="ml-2 rounded border-gray-300" name="filter[created_by_id]"><option selected="selected" value="">Автор</option><option value="1">Валерий Александрович Якушев</option><option value="2">Селиверстова Мария Андреевна</option><option value="3">Дорофееваа Василиса Романовна</option><option value="4">Инга Дмитриевна Тетеринаа</option><option value="5">Агафоноваа Ева Львовна</option><option value="6">Селезнёв Афанасий Львович</option><option value="7">Брагина Наталья Львовна</option><option value="8">Аксёноваа Софья Ивановна</option><option value="9">Филипп Львович Ефремова</option><option value="10">Моисеев Лев Андреевич</option><option value="11">Исаева Вячеслав Фёдорович</option><option value="12">Бронислав Романович Никифоров</option><option value="13">Журавлёв Добрыня Сергеевич</option><option value="14">Куликова Марта Андреевна</option><option value="15">Ярослав Максимович Устинов</option></select>
                </div>
                <div>
                    <select class="ml-2 rounded border-gray-300" name="filter[assigned_to_id]"><option selected="selected" value="">Исполнитель</option><option value="1">Валерий Александрович Якушев</option><option value="2">Селиверстова Мария Андреевна</option><option value="3">Дорофееваа Василиса Романовна</option><option value="4">Инга Дмитриевна Тетеринаа</option><option value="5">Агафоноваа Ева Львовна</option><option value="6">Селезнёв Афанасий Львович</option><option value="7">Брагина Наталья Львовна</option><option value="8">Аксёноваа Софья Ивановна</option><option value="9">Филипп Львович Ефремова</option><option value="10">Моисеев Лев Андреевич</option><option value="11">Исаева Вячеслав Фёдорович</option><option value="12">Бронислав Романович Никифоров</option><option value="13">Журавлёв Добрыня Сергеевич</option><option value="14">Куликова Марта Андреевна</option><option value="15">Ярослав Максимович Устинов</option></select>
                </div>
                <div>
                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2" type="submit" value="Применить">
                </div>
                </form>
            </div>
        </div>

        <div class="ml-auto">
                    </div>
    </div>

    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <th>ID</th>
                <th>Статус</th>
                <th>Имя</th>
                <th>Автор</th>
                <th>Исполнитель</th>
                <th>Дата создания</th>
                            </tr>
        </thead>
                <tr class="border-b border-dashed text-left">
            <td>1</td>
            <td>завершена</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/1">
                    Исправить ошибку в какой-нибудь строке
                </a>
            </td>
            <td>Исаева Вячеслав Фёдорович</td>
            <td>Селезнёв Афанасий Львович</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>2</td>
            <td>в архиве</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/2">
                    Допилить дизайн главной страницы
                </a>
            </td>
            <td>Брагина Наталья Львовна</td>
            <td>Селиверстова Мария Андреевна</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>3</td>
            <td>в архиве</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/3">
                    Отрефакторить авторизацию
                </a>
            </td>
            <td>Аксёноваа Софья Ивановна</td>
            <td>Журавлёв Добрыня Сергеевич</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>4</td>
            <td>новая</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/4">
                    Доработать команду подготовки БД
                </a>
            </td>
            <td>Куликова Марта Андреевна</td>
            <td>Филипп Львович Ефремова</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>5</td>
            <td>в архиве</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/5">
                    Пофиксить вон ту кнопку
                </a>
            </td>
            <td>Валерий Александрович Якушев</td>
            <td>Бронислав Романович Никифоров</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>6</td>
            <td>выполняется</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/6">
                    Исправить поиск
                </a>
            </td>
            <td>Ярослав Максимович Устинов</td>
            <td>Валерий Александрович Якушев</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>7</td>
            <td>в архиве</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/7">
                    Добавить интеграцию с облаками
                </a>
            </td>
            <td>Куликова Марта Андреевна</td>
            <td>Агафоноваа Ева Львовна</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>8</td>
            <td>завершена</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/8">
                    Выпилить лишние зависимости
                </a>
            </td>
            <td>Селезнёв Афанасий Львович</td>
            <td>Моисеев Лев Андреевич</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>9</td>
            <td>выполняется</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/9">
                    Запилить сертификаты
                </a>
            </td>
            <td>Валерий Александрович Якушев</td>
            <td>Ярослав Максимович Устинов</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>10</td>
            <td>завершена</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/10">
                    Выпилить игру престолов
                </a>
            </td>
            <td>Селиверстова Мария Андреевна</td>
            <td>Аксёноваа Софья Ивановна</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>11</td>
            <td>выполняется</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/11">
                    Пофиксить спеку во всех репозиториях
                </a>
            </td>
            <td>Аксёноваа Софья Ивановна</td>
            <td>Ярослав Максимович Устинов</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>12</td>
            <td>в архиве</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/12">
                    Вернуть крошки
                </a>
            </td>
            <td>Бронислав Романович Никифоров</td>
            <td>Бронислав Романович Никифоров</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>13</td>
            <td>завершена</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/13">
                    Установить Linux
                </a>
            </td>
            <td>Исаева Вячеслав Фёдорович</td>
            <td>Журавлёв Добрыня Сергеевич</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>14</td>
            <td>выполняется</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/14">
                    Потребовать прибавки к зарплате
                </a>
            </td>
            <td>Дорофееваа Василиса Романовна</td>
            <td>Аксёноваа Софья Ивановна</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
                <tr class="border-b border-dashed text-left">
            <td>15</td>
            <td>завершена</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/15">
                    Добавить поиск по фото
                </a>
            </td>
            <td>Дорофееваа Василиса Романовна</td>
            <td>Исаева Вячеслав Фёдорович</td>
            <td>26.08.2023</td>
            <td>
                                            </td>
        </tr>
            </table>

    <div class="mt-4">
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    &laquo; Previous
                </span>
            
                            <a href="https://php-task-manager-ru.hexlet.app/tasks?page=2" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Next &raquo;
                </a>
                    </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    Showing
                                            <span class="font-medium">1</span>
                        to
                        <span class="font-medium">15</span>
                                        of
                    <span class="font-medium">16</span>
                    results
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    
                                            <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    
                    
                                            
                        
                        
                                                                                                                        <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">1</span>
                                    </span>
                                                                                                                                <a href="https://php-task-manager-ru.hexlet.app/tasks?page=2" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 2">
                                        2
                                    </a>
                                                                                                        
                    
                                            <a href="https://php-task-manager-ru.hexlet.app/tasks?page=2" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next &amp;raquo;">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                                    </span>
            </div>
        </div>
    </nav>

    </div>
</div>
            </div>
        </section>

@endsection