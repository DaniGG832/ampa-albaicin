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

                    {{-- @if (!auth()->user()->activado)
                        <div class="text-xl p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium text-3xl">¡ ATENCION !</span> El usuario administrador debe activar
                            tu
                            cuenta para tener acceso a las fuciones de la aplicacion web, GRACIAS.
                        </div>
                    @endif --}}

                    {{--  {{$movimientos}} --}}
                    {{-- {{auth()->user()->activado}} --}}
                    @if(session()->has('success'))
                    <div class="flex p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <span class="font-medium">{{ session()->get('success') }}</span>
                        </div>
                      </div>
                    
                @endif
                @if(session()->has('error'))
                    <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <span class="font-medium">{{ session()->get('error') }}</span>
                        </div>
                      </div>
                    
                @endif

                    <div class="relative overflow-x-auto  m-5">
                        <table class="w-full text-sm text-left text-blue-500 rounded-xl bg-blue-100 ">



                            <tr class="font-semibold text-blue-900 dark:text-gray-700 uppercase ">
                                <th scope="row" class="px-6 py-3 text-xl text-blue-700 text-right">Total: </th>
                                <td class="px-6 py-3 text-2xl">{{ $total }} €</td>
                                {{-- <td class="px-6 py-3">Rocio</td> --}}
                            </tr>

                        </table>

                    </div>

                    @if (Auth()->user()->is_admin())
                        <div class="mb-2">
                            <form action="{{ route('movimientos.store') }}" method="post"
                                class="w-full max-w-sm border-t border-blue-500">


                                @csrf
                                @method('post')


                                <div class="items-center py-2">

                                    <div class="flex flex-col">

                                        <div> 
                                            <input name="concepto" required minlength="3" maxlength="255"
                                                class="appearance-none bg-transparent border border-blue-100 w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none dark:text-blue-50"
                                                type="text" value="{{ old('concepto') }}" placeholder="Concepto"
                                                aria-label="Full name">
                                                @error('concepto')
                                                <p class="text-red-500 text-sm mt-1">
                                                  {{ $message }}
                                                </p>
                                                @enderror

                                        </div>
                                        <div class="flex items-center border-b border-blue-500 py-2">
                                            <div>

                                                <input name="cantidad" required
                                                class="appearance-none bg-transparent border border-blue-100 w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none dark:text-blue-50"
                                                type="number" step="0.01" value="{{ old('cantidad') }}"
                                                placeholder="Cantidad" aria-label="Full name">
                                                @error('cantidad')
                                                <p class="text-red-500 text-sm mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div>

                                                
                                                <button type="submit"
                                                class="flex-shrink-0 border-transparent border-4 text-blue-500 hover:text-blue-800 text-sm py-1 px-2 rounded dark:text-blue-800 dark:bg-blue-100">
                                                Añadir
                                            </button>
                                        </div>
                                            
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

                                                <div class="text-lg">
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
                                                <div class="text-lg">
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
