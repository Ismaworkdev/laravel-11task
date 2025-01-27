<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="font-2xl text-purple-800">
                        Bienvenido {{ Auth::user()->name }} a tu gestor de Tareas.
                        <button
                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none my-6"
                            wire:click="openCreateModal"
                            type="button">
                            Añadir Tarea
                        </button>
                    </h1>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Titulo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descripcion
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($tasks->isEmpty())
                                <tr>
                                    <td colspan="3" class="text-center py-4">
                                        No hay tareas disponibles.
                                    </td>
                                </tr>
                                @else
                                @foreach ($tasks as $task)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $task->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $task->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button
                                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button" wire:click="updatetask({{$task}})">
                                            Editar
                                        </button>
                                        <button
                                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button" wire:click="delete({{$task}})">
                                            Borrar
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if ($modal)
        <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
        <div id="authentication-modal" class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto h-screen">
            <div class="relative w-full max-w-md px-4">
                <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                    <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="#">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Crear tarea</h3>
                        <div>
                            <label for="titulo" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Titulo</label>
                            <input type="text" wire:model="title" name="title" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Titulo de la tarea" required>
                        </div>
                        <div>
                            <label for="Descripcion" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Descripcion</label>
                            <input type="text" wire:model="description" name="description" id="password" placeholder="Descripcion de tu tarea" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            <a href="#" class="text-blue-700 hover:underline dark:text-blue-500" wire:click.prevent="createTask">Crear Tarea</a>
                            <a href="#" class="text-blue-700 hover:underline dark:text-blue-500" wire:click.prevent="closeCreateModal">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
        @endif
    </div>
</div>