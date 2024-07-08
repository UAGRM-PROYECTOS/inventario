<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = User::role('cliente')->get();
        return view('clientes.index', compact('clientes'));
       
    }

    public function indexApi()
    {
        $clientes =User::role('cliente')->get();
        return response()->json($clientes, 200);

      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    public function storeApi(Request $request)
    {
      /*  $validator = Validator::make($request->all(), [
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'nombre_beneficiario' => 'required|max:70',
            'codigo_unidad_vecinal' => 'required|numeric',
            'cantidad_facturas' => 'required|numeric',
            'UMZ' => 'required',
            // 'tipo_de_red' => 'required',
            'codigo_factura' => 'required',
            'importe_factura' => 'required|numeric',
        ],[
            'latitud.required' => 'La latitud es requerida',
            'latitud.numeric' => 'La latitud debe ser un número',
            'longitud.required' => 'La longitud es requerida',
            'longitud.numeric' => 'La longitud debe ser un número',
            'nombre_beneficiario.required' => 'El nombre del beneficiario es requerido',
            'nombre_beneficiario.max' => 'El nombre del beneficiario no debe exceder los 70 caracteres',
            'codigo_unidad_vecinal.required' => 'El código de la unidad vecinal es requerido',
            'codigo_unidad_vecinal.numeric' => 'El código de la unidad vecinal debe ser un número',
            'cantidad_facturas.required' => 'La cantidad de facturas es requerida',
            'cantidad_facturas.numeric' => 'La cantidad de facturas debe ser un número',
            'UMZ.required' => 'La UMZ es requerida',
            // 'tipo_de_red.required' => 'El tipo de red es requerido',
            'codigo_factura.required' => 'El código de la factura es requerido',
            'importe_factura.required' => 'El importe de la factura es requerido',
            'importe_factura.numeric' => 'El importe de la factura debe ser un número',
        ]);

        if ($validator->fails()) return response()->json($validator->errors(), 400);

        $coord = Coordenada::create($request->all());
        if ($coord) return response()->json(['message' => 'Coordenada creada correctamente'], 201);
        return response()->json(['message' => 'Error al crear la coordenada'], 500);
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showApi(string $id)
    {
      /*  $coord = Coordenada::find($id);
        if ($coord) return response()->json($coord, 200);
        return response()->json(['message' => 'Coordenada no encontrada'], 404);
        */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateApi(Request $request, string $id)
    {
        /*$validator = Validator::make($request->all(), [
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'nombre_beneficiario' => 'required|max:70',
            'codigo_unidad_vecinal' => 'required|numeric',
            'cantidad_facturas' => 'required|numeric',
            'UMZ' => 'required',
            // 'tipo_de_red' => 'required',
            'codigo_factura' => 'required',
            'importe_factura' => 'required|numeric',
        ],[
            'latitud.required' => 'La latitud es requerida',
            'latitud.numeric' => 'La latitud debe ser un número',
            'longitud.required' => 'La longitud es requerida',
            'longitud.numeric' => 'La longitud debe ser un número',
            'nombre_beneficiario.required' => 'El nombre del beneficiario es requerido',
            'nombre_beneficiario.max' => 'El nombre del beneficiario no debe exceder los 70 caracteres',
            'codigo_unidad_vecinal.required' => 'El código de la unidad vecinal es requerido',
            'codigo_unidad_vecinal.numeric' => 'El código de la unidad vecinal debe ser un número',
            'cantidad_facturas.required' => 'La cantidad de facturas es requerida',
            'cantidad_facturas.numeric' => 'La cantidad de facturas debe ser un número',
            'UMZ.required' => 'La UMZ es requerida',
            // 'tipo_de_red.required' => 'El tipo de red es requerido',
            'codigo_factura.required' => 'El código de la factura es requerido',
            'importe_factura.required' => 'El importe de la factura es requerido',
            'importe_factura.numeric' => 'El importe de la factura debe ser un número',
        ]);

        if ($validator->fails()) return response()->json($validator->errors(), 400);

        $coord = Coordenada::find($id);
        if ($coord) {
            $coord->update($request->all());
            return response()->json(['message' => 'Coordenada actualizada correctamente'], 200);
        }
        return response()->json(['message' => 'Coordenada no encontrada'], 404);
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroyApi(string $id)
    {
      /*  $coord = Coordenada::find($id);
        if ($coord) {
            $coord->delete();
            return response()->json(['message' => 'Coordenada eliminada correctamente'], 200);
        }
        return response()->json(['message' => 'Coordenada no encontrada'], 404);*/
    }

    public function cortarServicio(){
        //
    }

    public function cortarServicioApi(string $id){
       /* $coord = Coordenada::find($id);
        if ($coord) {
            $coord->cortarServicio();
            return response()->json(['message' => 'Coordenada sin servicio'], 200);
        }
        return response()->json(['message' => 'Coordenada no encontrada'], 404);
        */
    }

    // public function restaurarServicio(){
    //
    // }

    public function sinCortar(){
        //
    }

    public function sinCortarApi(){
     /*   $coordenadas = Coordenada::where('cortado', false)->get();
        return response()->json($coordenadas, 200);*/
    }

    public function cortadas(){
        //
    }

    public function cortadasApi(){
    /*    $coordenadas = Coordenada::where('cortado', true)->get();
        return response()->json($coordenadas, 200);*/
    }


}
