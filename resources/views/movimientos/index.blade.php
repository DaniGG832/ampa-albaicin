<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Movimientos
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
                            cuenta para tener acceso a las fuciones de la aplicacion web, GRACIAS.
                        </div>
                    @endif

                    {{--  {{$movimientos}} --}}
                    {{-- {{auth()->user()->activado}} --}}

                    <div class="relative overflow-x-auto  m-5">
                        <table class="w-full text-sm text-left text-blue-500 rounded-xl bg-blue-100 ">



                            <tr class="font-semibold text-blue-900 dark:text-white">
                                <th scope="row" class="px-6 py-3 text-base text-right">Total: </th>
                                <td class="px-6 py-3">{{ $total }} €</td>
                                {{-- <td class="px-6 py-3">Rocio</td> --}}
                            </tr>

                        </table>

                    </div>

                    @if (Auth()->user()->is_admin())
                        <div class="mb-2">
                            <form class="w-full max-w-sm border-t border-blue-500">
                                
                                <div class="items-center py-2">
                                    
                                    <div class="flex flex-col">

                                        <div>
                                        <input
                                            class="appearance-none bg-transparent border border-blue-100 w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                            type="text" placeholder="Concepto" aria-label="Full name">


                                            </div>
                                            <div class="flex items-center border-b border-blue-500 py-2">
                                                <input
                                                    class="appearance-none bg-transparent border border-blue-100 w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                                    type="text" placeholder="Cantidad" aria-label="Full name">
        
                                                    
                                                    <button
                                                    class="flex-shrink-0 border-transparent border-4 text-blue-500 hover:text-blue-800 text-sm py-1 px-2 rounded"
                                                    type="button">
                                                    Añadir
                                                </button>

                                            </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    @endif


                    <div class="my-2">

                        {{ $movimientos->links() }}
                    </div>


                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-blue-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-blue-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                                        Concepto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cantidad
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                                        Usuario
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movimientos as $movimiento)
                                    <tr class="bg-white dark:bg-gray-800">
                                        <th scope="row"
                                            class="  max-w-xs px-6 py-4 font-medium text-blue-900 dark:text-white">
                                            <div class="flex flex-col">

                                                <div>
                                                    {{ $movimiento->concepto }}

                                                </div>
                                                <div class="text-right text-gray-300 text-xs">

                                                    <div>
                                                        {{ $movimiento->created_at->format('H:i:s') }}

                                                    </div>
                                                    <div>

                                                        {{ $movimiento->created_at->format('d-m-Y') }}
                                                    </div>


                                                </div>

                                            </div>

                                        </th>
                                        <td
                                            class="px-6 py-4 {{ $movimiento->positivo() ? 'text-green-600' : 'text-red-700' }}">

                                            <div class="flex flex-col">
                                                <div class="">
                                                    {{ $movimiento->cantidad }} €

                                                </div>
                                                <div class="text-gray-400 text-sm">
                                                    {{ $movimiento->subtotal }} €

                                                </div>

                                            </div>

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $movimiento->user->name }}

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            {{-- <tfoot>
                            <tr class="font-semibold text-gray-900 dark:text-white">
                                <th scope="row" class="px-6 py-3 text-base">Total</th>
                                <td class="px-6 py-3">21,000</td>
                                <td class="px-6 py-3">Rocio</td>
                            </tr>
                        </tfoot> --}}
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
