<?php

namespace App\Http\Controllers;

use App\Models\DetalleOrden;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleOrdenRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetalleOrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detalleOrdens = DetalleOrden::paginate();

        return view('detalle-orden.index', compact('detalleOrdens'))
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
        $detalleOrden->update($request->validated());

        return Redirect::route('detalle-ordens.index')
            ->with('success', 'DetalleOrden updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        DetalleOrden::find($id)->delete();

        return Redirect::route('detalle-ordens.index')
            ->with('success', 'DetalleOrden deleted successfully');
    }
}
