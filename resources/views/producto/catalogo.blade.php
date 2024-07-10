<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catálogo') }}
        </h2>
    </x-slot>

    <!-- Catálogo -->
    <div class="flex flex-col lg:grid lg:grid-cols-4 lg:grid-rows-5">
        @forelse ($productos as $producto)
            <div class="bg-white m-2 rounded-lg flex border">
                <img src="{{$producto->imagen}}" class="rounded-l-lg" width="200" alt="{{$producto->nombre}}">
                @if ($producto->stock == 0)
                        <span class="absolute bg-gray-50 text-white px-2 py-1 text-xs font-semibold uppercase">Sin Stock</span>
                    @endif
                <div>
                    <a class=" pt-3 px-3 hover:text-xl font-bold hover:cursor-pointer" href="{{route('productos.show', $producto->id)}}">{{$producto->nombre}}</a>
                    <p class=" px-3"><span class="font-bold">Precio:</span> {{$producto->precio}} Bs.</p>
                    <p class=" px-3 lowercase">
                        <span class="font-bold capitalize">Descripción: </span>
                        {{$producto->descripcion}}
                    </p>

                    <div class="m-3 bg-grey-800 hover:bg-white p-5 inline-block rounded-lg" >
                        <div class="flex justify-center">
                        <form method="POST" action="{{ route('detalle-ordens.create') }}" role="form"
                          enctype="multipart/form-data" id="store{{ $loop->index }}">
                        @csrf
                        <input type="number" id="cantidad" name="cantidad" min="1" max="1000" value="1">

                        <input type="hidden" name="precio" id="precio" value="{{ $producto->precio }}">
                        <input type="hidden" name="idProducto" id="idProducto" value="{{ $producto->id }}">
                        @auth
                            @if ($pedidos)
                                <input type="hidden" name="idCarrito" id="idCarrito" value="{{ $pedidos->id }}">
                            @else
                                <input type="hidden" name="idCarrito" id="idCarrito" value="default value">
                            @endif
                        @endauth
                    </form>
                    <div class="mt-4">
                        <button class="bg-black hover:bg-grey-800 text-white font-bold py-2 px-4 rounded"
                                form="store{{ $loop->index }}">
                                <div class="flex justify-center">
                            <p class="text-white">+</p>
                            <x-car></x-car>
                        </div>
                        </button>
                    </div>
                        </div>
</div>

                </div>

            </div>
        @empty

        <p class="bg-red-700 rounded-lg p-2 text-white">No se encuentran pizzas con esos términos</p>


    </div>


            @endforelse
    </div>
</x-app-layout>
