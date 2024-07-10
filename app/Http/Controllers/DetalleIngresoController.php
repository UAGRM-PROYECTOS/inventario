<?php

namespace App\Http\Controllers;

use App\Models\DetalleIngreso;
use App\Models\Ingreso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleIngresoRequest;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

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
    });

        return Redirect::route('ingresos.show', $ingreso->id)
            ->with('success', 'DetalleIngreso updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $ingreso = null; 
        DB::transaction(function () use ($id, &$ingreso) {
            // Encontrar el detalle de ingreso que se va a eliminar
            $detalleIngreso = DetalleIngreso::findOrFail($id);
    
            // Encontrar el ingreso asociado
            $ingreso = Ingreso::findOrFail($detalleIngreso->ingreso_id);
    
            // Actualizar el total del ingreso restando el costo total del detalle de ingreso
            $ingreso->total -= $detalleIngreso->costo_total;
            $ingreso->save();
    
            // Eliminar el detalle de ingreso
            $detalleIngreso->delete();
        });

        return Redirect::route('ingresos.show', $ingreso->id)
        ->with('success', 'DetalleIngreso deleted successfully.');
    }
}
