<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'cod_barra' => 'required|string',
			'nombre' => 'required|string',
			'descripcion' => 'required|string',
			'precio' => 'required',
			'costo_promedio' => 'required',
			'stock' => 'required',
			'stock_min' => 'required',
			'categoria_id' => 'required',
        ];
    }
}
