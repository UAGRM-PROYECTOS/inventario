<?php

namespace App\Http\Controllers;

use App\Models\DetalleOrden;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleOrdenRequest;
use App\Models\Orden;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('America/La_Paz');
class DetalleOrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $userId = Auth::id();

        // Retrieve the last order of the authenticated user
        $orden = Orden::where('cliente_id', $userId)->orderBy('fecha', 'desc')->first();
        $detalleOrdens = DetalleOrden::where('orden_id', $orden->id)->paginate(10);

        return view('detalle-orden.index', compact('detalleOrdens','orden'))
            ->with('i', ($request->input('page', 1) - 1) * $detalleOrdens->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $detalleOrden = new DetalleOrden();

        return view('detalle-orden.create', compact('detalleOrden'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetalleOrdenRequest $request): RedirectResponse
    {
        DetalleOrden::create($request->validated());

        return Redirect::route('detalle-ordens.index')
            ->with('success', 'DetalleOrden created successfully.');
    }


     /**
      *Add pedido to orden
      */
      public function addPedidoOrden(Request $request): RedirectResponse
      {
              // Recibir los parámetros del formulario
              $cantidad = $request->input('cantidad');
              $precio = $request->input('precio');
              $idProducto = $request->input('idProducto');
              $ordenId = $request->input('orden');
          
              // Validar y obtener la orden actual
              $orden = Orden::findOrFail($ordenId);
          
              // Crear un nuevo detalle de orden
              $detalleOrden = new DetalleOrden();
              $detalleOrden->orden_id = $orden->id;
              $detalleOrden->producto_id = $idProducto;
              $detalleOrden->cantidad = $cantidad;
              $detalleOrden->precio_unitario = $precio;
              // Calcular el precio total, si es necesario
              $detalleOrden->precio_total = $cantidad * $precio; // Ejemplo básico, ajusta según tu lógica
          
              // Guardar el detalle de orden
              $detalleOrden->save();
          
              // Actualizar el total de la orden
              $orden->total += $detalleOrden->precio_total;
              $orden->save();
          
              return Redirect::route('ordens.show', $orden->id)->with('success', 'Producto agregado correctamente a la orden.');
          }
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $detalleOrden = DetalleOrden::find($id);

        return view('detalle-orden.show', compact('detalleOrden'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $detalleOrden = DetalleOrden::find($id);

        return view('detalle-orden.edit', compact('detalleOrden'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetalleOrdenRequest $request, DetalleOrden $detalleOrden): RedirectResponse
    {
        $orden = null;

        DB::transaction(function () use ($request, $detalleOrden, &$orden) {
            // Encontrar el ingreso asociado antes de la actualización
            $orden = Orden::findOrFail($detalleOrden->orden_id);
    
            // Restar el costo total anterior del ingreso
            $orden->total -= $detalleOrden->precio_total;
    
            // Actualizar el detalle de ingreso con los nuevos datos
            $detalleOrden->update($request->validated());
    
            // Sumar el nuevo costo total al ingreso
            $orden->total += $detalleOrden->precio_total;
    
            // Guardar el ingreso actualizado
            $orden->save();
        });
    
        return Redirect::route('ordens.show', $orden->id)
            ->with('success', 'DetalleOrden updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
      
        $orden = null; // Inicializar la variable $orden

    DB::transaction(function () use ($id, &$orden) {
        try {
            // Encontrar el detalle de orden que se va a eliminar
            $detalleOrden = DetalleOrden::findOrFail($id);

            // Encontrar la orden asociada al detalle
            $orden = Orden::findOrFail($detalleOrden->orden_id);

            // Verificar si el total de la orden es menor que el precio total del detalle
            if ($orden->total < $detalleOrden->precio_total) {
                throw new \Exception('El total de la orden no puede ser menor que cero.');
            }

            // Actualizar el total de la orden restando el precio total del detalle
            $orden->total -= $detalleOrden->precio_total;
            $orden->save();

            // Eliminar el detalle de orden
            $detalleOrden->delete();

        } catch (ModelNotFoundException $e) {
            // Manejar excepción si no se encuentra el detalle de orden o la orden
            return Redirect::back()->with('error', 'No se pudo encontrar el detalle de orden.');
        } catch (\Exception $e) {
            // Manejar otras excepciones
            return Redirect::back()->with('error', $e->getMessage());
        }
        
    });



        return Redirect::route('ordens.show', $orden->id)
            ->with('success', 'DetalleOrden deleted successfully');
    }
}
