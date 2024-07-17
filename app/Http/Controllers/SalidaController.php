<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SalidaRequest;
use App\Models\DetalleOrden;
use App\Models\Inventario;
use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
date_default_timezone_set('America/La_Paz');
class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $salidas = Salida::paginate();

        return view('salida.index', compact('salidas'))
            ->with('i', ($request->input('page', 1) - 1) * $salidas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $salida = new Salida();

        return view('salida.create', compact('salida'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($ordenId)
    {

        $orden = Orden::findOrFail($ordenId);
        $detalleOrden = DetalleOrden::findOrFail($ordenId);
        $producto = Producto::findOrFail($detalleOrden->producto_id);
        DB::beginTransaction();
        try {
                Salida::create([
                    'metodovaluacion_id' => 1, // 1 -> PEPS por defecto
                    'orden_id' => $orden->id,
                    'estado_id' => 8, // Ajusta el estado según tus constantes
                    'fecha_salida' => now(),
                ]);

                    $inventario = Inventario::where('producto_id', $producto->id)
                                            ->orderBy('fecha_ingreso', 'asc')
                                            ->first();
    
                    if ($inventario) {
                        $cantidadRestante = $inventario->cantidad - $detalleOrden->cantidad;
    
                        if ($cantidadRestante >= 0) {
                            $inventario->update(['cantidad' => $cantidadRestante]);
                        } else {
                            // Manejar la lógica de cantidades parciales y eliminar registros de inventario vacíos
                            // Actualizar el stock del producto
                            $producto->stock -= $detalleOrden->cantidad;
                        }
                    }
                
                $orden->update([
                    'estado_id' => 8, // Ajusta el estado según tus constantes
                ]);
                // Actualizar Inventario
              /*  $inventario->update([
                    'estado_id' => ESTADO_ENTREGADO,
                ]);*/

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            
            throw $e;
            }

            return response()->json(['message' => 'Salidas registradas correctamente.']);
    }
        
    


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $salida = Salida::find($id);

        return view('salida.show', compact('salida'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $salida = Salida::find($id);

        return view('salida.edit', compact('salida'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalidaRequest $request, Salida $salida): RedirectResponse
    {
        $salida->update($request->validated());

        return Redirect::route('salidas.index')
            ->with('success', 'Salida updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Salida::find($id)->delete();

        return Redirect::route('salidas.index')
            ->with('success', 'Salida deleted successfully');
    }
}
