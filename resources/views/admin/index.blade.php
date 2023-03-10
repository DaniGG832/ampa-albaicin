<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- component -->
                    <div class="flex flex-col border ">
                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden flex justify-center">
                                    <table class="min-w-full">
                                        <thead class="bg-gray-200 border-b">
                                            <tr>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Nombre/Email
                                                </th>

                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Editar
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr
                                                    class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">

                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <div class="flex flex-col">
                                                            <div>{{ $user->name }}</div>
                                                            <div>{{ $user->email }}</div>

                                                        </div>
                                                    </td>

                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <div class="flex flex-col">

                                                            @if ($user->admin)
                                                                <div><a class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                                                                        href="">Admin</a> </div>
                                                            @else
                                                                <div><a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                                                                        href="">Editar</a></div>

                                                        </div>
                                            @endif
                                            </td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
