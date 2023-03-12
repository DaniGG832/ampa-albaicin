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
                          cuenta para tener acceso a las fuciones de la aplicacion web, CRACIAS.
                      </div>
                  @endif

                 {{--  {{$movimientos}} --}}
                  {{-- {{auth()->user()->activado}} --}}

                  <div class="relative overflow-x-auto  m-5">
                    <table class="w-full text-sm text-left text-blue-500 rounded-xl bg-blue-100 ">


                        
                            <tr class="font-semibold text-blue-900 dark:text-white">
                                <th scope="row" class="px-6 py-3 text-base text-right">Total: </th>
                                <td class="px-6 py-3">{{$total}} €</td>
                                {{-- <td class="px-6 py-3">Rocio</td> --}}
                            </tr>
                        
                    </table>

                  </div>
               


                  <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-blue-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 rounded-l-lg">
                                    Concepto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Precio
                                </th>
                                <th scope="col" class="px-6 py-3 rounded-r-lg">
                                    Usuario
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientos as $movimiento)
                                
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="  max-w-xs px-6 py-4 font-medium text-blue-900 dark:text-white">
                                    {{$movimiento->concepto}} 
                                    Apple MacBook Pro 17"
                                    Apple MacBook Pro 17"
                                    Apple MacBook Pro 17"
                                    Apple MacBook Pro 17"
                                    Apple MacBook Pro 17"
                                    Apple MacBook Pro 17"
                                    Apple MacBook Pro 17"
                                    Apple MacBook Pro 17"
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4">
                                    {{$movimiento->cantidad}} €

                                </td>
                                <td class="px-6 py-4">
                                    {{$movimiento->user->name}} 

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
