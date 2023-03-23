<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Admin/admin') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">

                  @if(session()->has('success'))
                  <div class="flex p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                      <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Info</span>
                      <div>
                        <span class="font-medium">{{ session()->get('success') }}</span>
                      </div>
                    </div>
                  
              @endif
                  <!-- component -->
                  <div class="flex flex-col">

                      <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                              
                              {{-- {{request()->get('rq')}} --}}

                              <div class="my-5"><a href="{{route('admin.index')}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500"
                                href="">Atras</a></div>

                             {{--  @if (request()->get('admin'))
                              <div class="my-5"><a href="{{route('admin.admin')}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500"
                                  href="">Mostrar todos</a></div>
                                  
                              @else
                                  <div class="my-5"><a href="{{route('admin.admin',['admin'=>1])}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500"
                                          href="">Mostrar inactivos</a></div>
                              @endif --}}
                                    
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
                                                  Click para cambiar
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
                                                          <div class="text-gray-900 text-2xl">{{ $user->name }}
                                                          </div>
                                                          <div>{{ $user->email }}</div>

                                                      </div>
                                                  </td>

                                                  <td
                                                      class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                      <div class="flex flex-col">

                                                          
                                                              @if ($user->admin && $user->activado)
                                                              <form action="{{route('admin.update.admin',$user)}}" method="post">
                                                                @method('PUT')
                                                                @csrf
                                                                  <div><button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
                                                                          href="">Admin</button></div>
                                                                  </form>
                                                              @else
                                                                  <form action="{{route('admin.update.admin',$user)}}" method="post">
                                                                    @method('PUT')
                                                                    @csrf
                                                                  <div><button
                                                                          class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
                                                                          href="">No admin</button></div>
                                                                  </form>
                                                              

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
