<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Inicio
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (!auth()->user()->activado)
                        <div class="text-xl p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium text-3xl">¡ ATENCION !</span> El usuario administrador debe activar
                            tu
                            cuenta para tener acceso a las fuciones de la aplicacion web, CRACIAS.
                        </div>
                    @endif


                    {{-- {{ auth()->user()->is_admin() }} --}}
                    {{-- {{auth()->user()->activado}} --}}

                    <div class="flex flex-col">

                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">

                                {{-- {{request()->get('rq')}} --}}

                                <div class=" flex justify-center ">

                                    <div class=" flex flex-col items-center">


                                        <div class="m-5"><a href="{{ route('movimientos.index') }}"
                                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500"
                                                href="">Movimientos</a></div>

                                        <div class="m-5"><a href="{{ route('admin.index') }}"
                                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500"
                                                href=""> Menu Admin</a></div>

                                        {{-- <div class="m-5"><a href="{{ route('admin.admin') }}"
                                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500"
                                                href="">Activar/Desactivar Usuarios Admin</a></div> --}}


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
