<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Orden;
use App\Models\DetalleOrden;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', ($request->input('page', 1) - 1) * $productos->perPage());
    }
    public function CatalogoView()
    {
        $productos = Producto::paginate(9);
        $categorias = Categoria::get();
        if (auth()->user()) {
            $pedidos = Orden::where('cliente_id', auth()->user()->id);
            $pedidos = $pedidos->where('estado_id', 1)->first();
            $detallesPedidos = DetalleOrden::get();
            return view('producto.catalogo', compact('productos', 'categorias', 'pedidos', 'detallesPedidos'));
        }
        return view('producto.catalogo', compact('productos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $producto = new Producto();
        $imagen= Producto::get('imagen');
        $categorias = Categoria::all(); 
        return view('producto.create', compact('producto', 'categorias','imagen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request): RedirectResponse
    {
       // Handle image upload
       if ($request->hasFile('imagen')) {
        $imagePath = $request->file('imagen')->getRealPath();
        $uploadedFileUrl = Cloudinary::upload($imagePath)->getSecurePath();
    }

    // Create the product
    $producto = Producto::create($request->validated());

    // Set the imagen field if uploaded
    if (isset($uploadedFileUrl)) {
        $producto->imagen = $uploadedFileUrl;
        $producto->save();
    }

        return Redirect::route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all(); 
        return view('producto.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto): RedirectResponse
    {
       
        // Handle image upload to Cloudinary
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->getRealPath();
            $uploadedFile = Cloudinary::upload($imagePath);
            $uploadedFileUrl = $uploadedFile->getSecurePath();

            // Update the product's imagen field
            $producto->imagen = $uploadedFileUrl;
        }

        $producto->update($request->validated());

    
        return Redirect::route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Producto::find($id)->delete();

        return Redirect::route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
