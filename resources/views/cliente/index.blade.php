<x-app-layout>
    <x-slot name="header">
        <h2 
        :class="{ 'italic-font': isYoungMode }"
        class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes') }}
        </h2>
    </x-slot>
    <div class="mt-3 max-w-2xl mx-auto lg:px-14">
        <a type="button" href="{{ route('clientes.create') }}"
            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
            new</a>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card mt-3">
                    <div class="card-header d-inline">
                        <h1>
                            <center><b>CLIENTES</b></center>
                        </h1>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                        <table class="w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>
                                        
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Nombre</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Email</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Sexo</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Telefono</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Direccion</th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <?php
                                    $valor = 1;
                                    ?>
                                    @foreach ($clientes as $cliente)

                                    <tr class="even:bg-gray-50">
                                        <th scope="row">{{ $valor++ }}</th>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $cliente->name }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $cliente->email }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $cliente->sexo }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $cliente->telefono }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $cliente->direccion }}</td>

                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                                <a href="{{ route('clientes.show', $cliente->id) }}"
                                                    class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                <a href="{{ route('clientes.edit', $cliente->id) }}"
                                                    class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('clientes.destroy', $cliente->id) }}"
                                                    class="text-red-600 font-bold hover:text-red-900"
                                                    onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>
                                            </form>
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
    <footer class="flex justify-center m-2">
            <p class="text-sm text-gray-600">Cantidad de visitas: {{ optional($visits)->cant }}</p>
        </footer>
</x-app-layout>