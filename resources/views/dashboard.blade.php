<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

 
                    <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                                        <h3 class="font-semibold text-lg">KPI</h3>
                                        <div class="flex gap-2">
                                            <div class="bg-green-200 mt-5 p-3 rounded-lg flex flex-col justify-center">
                                                <p class="font-bold">Cantidad de Productos vendidos: <span
                                                        class="font-normal">{{$cantProdVendidos ?? 'N/A'}}</span>
                                                </p>
                                               <!-- <p>Vendida: <span>{{$pizzaMasVendida['total_pedidos'] ?? '0'}}</span>
                                                    veces</p>-->
                                            </div>
                                            <div class="bg-red-200 mt-5 p-3 rounded-lg flex flex-col justify-center">
                                                <p class="font-bold">Cantidad de ventas obtenidads: <span
                                                        class="font-normal">{{$cantVentasObtenidas ?? 'N/A'}}</span>
                                                </p>
                                                <!--<p>Vendida: <span>{{$pizzaMenosVendida['total_pedidos'] ?? '0'}}</span>
                                                    veces</p>-->
                                            </div>
                                            <div class="bg-blue-200 mt-5 p-3 rounded-lg">
                                                <p class="font-bold">Cantidad de usuarios: <span
                                                        class="font-normal">{{$cantUser}}</span></p>
                                                <p>Cantidad de clientes: <span>{{$cantClientes}}</span></p>
                                                <p>Cantidad de administradores: <span>{{$cantAdmin}}</span></p>
                                            </div>
                                            <div class="bg-yellow-200 mt-5 p-3 rounded-lg flex flex-col justify-center">
                                                <p class="font-bold">Cantidad Total en Bs por ventas: <span
                                                        class="font-normal">{{$cantidadTotalVentas ?? 'N/A'}}</span>
                                                </p>
                                                <!--<p>Vendida: <span>{{$pizzaMenosVendida['total_pedidos'] ?? '0'}}</span>
                                                    veces</p>-->
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap">

    <div class="w-full md:w-1/2 p-3">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <h3 class="font-semibold text-lg p-4">
                {{$pedidos_month_chart->options['chart_title']}}
            </h3>
            <div class="p-4">
                {!! $pedidos_month_chart->renderHtml() !!}
                {!! $pedidos_month_chart->renderChartJsLibrary() !!}
                {!! $pedidos_month_chart->renderJs() !!}
            </div>
        </div>
    </div>


    <div class="w-full md:w-1/2 p-3">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <h3 class="font-semibold text-lg p-4">
            {{$productos_chart_instance->options['chart_title']}}
            </h3>
            <div class="p-8">
            {!! $productos_chart_instance->renderHtml() !!}
            {!! $productos_chart_instance->renderChartJsLibrary() !!}
            {!! $productos_chart_instance->renderJs() !!}
            </div>
        </div>
    </div>
</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <x-visits> {{$visits->cant}} </x-visits>
                        @section('scripts')
                        {!! $user_month_chart->renderChartJsLibrary() !!}
                        {!! $user_month_chart->renderJs() !!}
                        {!! $pedidos_month_chart->renderChartJsLibrary() !!}
                        {!! $pedidos_month_chart->renderJs() !!}
                        @endsection



</x-app-layout>
