<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrdenRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $ordens = Orden::paginate();

        return view('orden.index', compact('ordens'))
            ->with('i', ($request->input('page', 1) - 1) * $ordens->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $orden = new Orden();

        return view('orden.create', compact('orden'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdenRequest $request): RedirectResponse
    {
        Orden::create($request->validated());

        return Redirect::route('ordens.index')
            ->with('success', 'Orden created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $orden = Orden::find($id);

        return view('orden.show', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $orden = Orden::find($id);

        return view('orden.edit', compact('orden'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdenRequest $request, Orden $orden): RedirectResponse
    {
        $orden->update($request->validated());

        return Redirect::route('ordens.index')
            ->with('success', 'Orden updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Orden::find($id)->delete();

        return Redirect::route('ordens.index')
            ->with('success', 'Orden deleted successfully');
    }
}
