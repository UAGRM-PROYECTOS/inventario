<?php

namespace App\Http\Controllers;

use App\Models\DetalleOrden;
use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index()
    {
        $cantUser = User::count();
        $cantAdmin = User::role('admin')->get()->count();
        $cantClientes = User::role('cliente')->get()->count();
        $visits = Visit::where(['page_name' => 'dashboard'])->first();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $cantProdVendidos = DetalleOrden::whereHas('orden', function ($query) use ($startOfMonth, $endOfMonth) {
            $query->where('estado_id', 2) // Estado 2 = 'PAGADO'
                  ->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        })
        ->sum('cantidad');
        

        $cantVentasObtenidas = Orden::where('estado_id', 2) // Estado 2 = 'PAGADO'
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->count();

        $cantidadTotalVentas = Orden::where('estado_id', 2) // Estado 2 = 'PAGADO'
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->sum('total');


        $user_month = [
            'chart_title' => 'Usuarios por mes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $user_month_chart = new LaravelChart($user_month);

        $roles_chart = [
            'chart_title' => 'Usuarios por rol',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\User',
            'group_by_field' => 'role_id',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            'aggregate_function' => 'count',
            'data' => [
                'roles' => [
                    'admin' => $cantAdmin,
                    'cliente' => $cantClientes,
                ]
            ]
        ];
        $roles_chart_instance = new LaravelChart($roles_chart);

        
    // Fecha hace tres meses
    $threeMonthsAgo = Carbon::now()->subMonths(3);

    // Configuración del gráfico de pedidos por mes para los últimos tres meses
    $pedidos_month = [
        'chart_title' => 'Pedidos por mes',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Orden',
        'group_by_field' => 'fecha',
        'group_by_period' => 'month',
        'aggregate_function' => 'count',
        'chart_type' => 'bar',
        'filter_field' => 'fecha',
        'filter_from' => $threeMonthsAgo->toDateString(), // Filtrar desde hace tres meses
        'filter_to' => Carbon::now()->toDateString(), // Filtrar hasta la fecha actual
    ];

        $pedidos_month_chart = new LaravelChart($pedidos_month);

        // Obtener los productos más vendidos con sus cantidades
        $productosMasVendidos = DetalleOrden::select('producto_id', DB::raw('SUM(cantidad) as total_vendido'))
        ->groupBy('producto_id')
        ->orderByDesc('total_vendido')
        ->take(3)
        ->get();

        // Obtener los nombres de los productos y cantidades vendidas
        $productosNombres = [];
        $productosCantidades = [];
        foreach ($productosMasVendidos as $detalle) {
            $producto = Producto::find($detalle->producto_id); // Cambiar a findOrFail para manejar errores
                if ($producto) {
                     $productosNombres[] = $producto->nombre; // Aquí obtenemos el nombre del producto
                     $productosCantidades[] = $detalle->cantidad; // Utilizar el alias total_vendido
                }
                
        }
      


// Crear el gráfico
$productos_chart = [
'chart_title' => 'Top 3 Productos Más Vendidos',
'report_type' => 'group_by_string',
'model' => 'App\Models\DetalleOrden',
'group_by_field' => 'producto_id', // Aunque agrupamos por producto_id, los nombres se utilizarán en labels
'chart_type' => 'pie',
'data' => [
    'labels' => $productosNombres,
    'datasets' => [
        [
            'label' => 'Cantidad Vendida',
            'data' => $productosCantidades,
        ],
    ],
],
];
$productos_chart_instance = new LaravelChart($productos_chart);

        return view('dashboard',[
            'cantUser' => $cantUser,
            'cantClientes' => $cantClientes,
            'cantProdVendidos' => $cantProdVendidos,
            'cantVentasObtenidas' => $cantVentasObtenidas,
            'cantidadTotalVentas'=> $cantidadTotalVentas,
            'cantAdmin' => $cantAdmin,
            'user_month_chart' => $user_month_chart,
            'pedidos_month_chart' => $pedidos_month_chart,
            'roles_chart_instance' => $roles_chart_instance,
            'productos_chart_instance' => $productos_chart_instance,
            'visits' => $visits,
        ]);
    }
}
