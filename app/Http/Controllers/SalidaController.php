<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SalidaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
    public function store(SalidaRequest $request): RedirectResponse
    {
        Salida::create($request->validated());

        return Redirect::route('salidas.index')
            ->with('success', 'Salida created successfully.');
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
