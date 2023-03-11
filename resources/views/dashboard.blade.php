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

                    @if (!auth()->user()->activado)
                        <div class="text-xl p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium text-3xl">¡ ATENCION !</span> El usuario administrador debe activar
                            tu
                            cuenta para tener acceso a las fuciones de la aplicacion web, CRACIAS.
                        </div>
                    @endif

                    {{-- {{auth()->user()->activado}} --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
