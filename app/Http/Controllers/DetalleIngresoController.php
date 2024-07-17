<?php

namespace App\Http\Controllers;

use App\Models\DetalleIngreso;
use App\Models\Ingreso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleIngresoRequest;
use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('America/La_Paz');
class DetalleIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detalleIngresos = DetalleIngreso::paginate();
        return view('detalle-ingreso.index', compact('detalleIngresos'))
            ->with('i', ($request->input('page', 1) - 1) * $detalleIngresos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

    
        $detalleIngreso = new DetalleIngreso();
        $productos = Producto::all(); 
        return view('detalle-ingreso.create', compact('detalleIngreso', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetalleIngresoRequest $request): RedirectResponse
    {

        $ingreso = null; // Inicializar la variable $ingreso

    DB::transaction(function () use ($request, &$ingreso) {
        // Crear el nuevo detalle de ingreso
        $detalleIngreso = DetalleIngreso::create($request->validated());

        // Encontrar el ingreso asociado
        $ingreso = Ingreso::findOrFail($detalleIngreso->ingreso_id);

        // Actualizar el total del ingreso
        $ingreso->total += $detalleIngreso->costo_total;
        $ingreso->save();

        $producto = Producto::findOrFail($detalleIngreso->producto_id);

        Inventario::create([
            'producto_id' => $detalleIngreso->producto_id,
            'cantidad' => $detalleIngreso->cantidad,
            'costo_unitario' => $detalleIngreso->costo_unitario,
            'fecha_ingreso' => $detalleIngreso->ingreso->fecha_ingreso,
        ]);

        
        $producto->stock += $detalleIngreso->cantidad;
        $producto->save();
    });


    

    return Redirect::route('ingresos.show', $ingreso->id)
        ->with('success', 'DetalleIngreso created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        
        // Encuentra el ingreso asociado
        $ingreso = Ingreso::find($id);
        $productos = Producto::all(); 
        // Crea un nuevo detalle de ingreso asociado a este ingreso
        $detalleIngreso = new DetalleIngreso();
        $detalleIngreso->ingreso_id = $id; // Asigna el ID del ingreso al detalle de ingreso
    
        return view('detalle-ingreso.create', compact('detalleIngreso', 'ingreso','productos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $detalleIngreso = DetalleIngreso::find($id);
        $productos = Producto::all(); 
        return view('detalle-ingreso.edit', compact('detalleIngreso', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetalleIngresoRequest $request, DetalleIngreso $detalleIngreso): RedirectResponse
    {
        $ingreso = null;

    DB::transaction(function () use ($request, $detalleIngreso, &$ingreso) {
        try {
        // Encontrar el ingreso asociado antes de la actualización
        $ingreso = Ingreso::findOrFail($detalleIngreso->ingreso_id);

        // Restar el costo total anterior del ingreso
        $ingreso->total -= $detalleIngreso->costo_total;

        // Actualizar el detalle de ingreso con los nuevos datos
        $detalleIngreso->update($request->validated());

        // Sumar el nuevo costo total al ingreso
        $ingreso->total += $detalleIngreso->costo_total;

        // Guardar el ingreso actualizado
        $ingreso->save();
    
    } catch (ModelNotFoundException $e) {
        // Manejar excepción si no se encuentra el detalle de orden o la orden
        return Redirect::back()->with('error', 'No se pudo encontrar el detalle de orden.');
    } catch (\Exception $e) {
        // Manejar otras excepciones
        return Redirect::back()->with('error', $e->getMessage());
    }
    });

        return Redirect::route('ingresos.show', $ingreso->id)
            ->with('success', 'DetalleIngreso updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $ingreso = null; 
        DB::transaction(function () use ($id, &$ingreso) {
            try {
            // Encontrar el detalle de ingreso que se va a eliminar
            $detalleIngreso = DetalleIngreso::findOrFail($id);
    
            // Encontrar el ingreso asociado
            $ingreso = Ingreso::findOrFail($detalleIngreso->ingreso_id);
    // Verificar si el total de la orden es menor que el precio total del detalle
         if ($ingreso->total < $detalleIngreso->costo_total) {
        throw new \Exception('El total no puede ser menor que cero.');
        }
            // Actualizar el total del ingreso restando el costo total del detalle de ingreso
            $ingreso->total -= $detalleIngreso->costo_total;
            $ingreso->save();
    
            // Eliminar el detalle de ingreso
            $detalleIngreso->delete();
        } catch (ModelNotFoundException $e) {
            // Manejar excepción si no se encuentra el detalle de orden o la orden
            return Redirect::back()->with('error', 'No se pudo encontrar el detalle de orden.');
        } catch (\Exception $e) {
            // Manejar otras excepciones
            return Redirect::back()->with('error', $e->getMessage());
        }
        });

        return Redirect::route('ingresos.show', $ingreso->id)
        ->with('success', 'DetalleIngreso deleted successfully.');
    }
}
