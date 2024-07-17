<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $productos = [
            ['Manzana', 'FRU001', 'Manzana roja fresca', 'unidad', null, 0.30, 0.20, 200, 50, 1],
            ['Banana', 'FRU002', 'Bananas orgánicas', 'unidad', null, 0.40, 0.25, 180, 30, 1],
            ['Zanahoria', 'VER001', 'Zanahorias frescas', 'unidad', null, 0.10, 0.05, 300, 50, 2],
            ['Lechuga', 'VER002', 'Lechuga romana', 'unidad', null, 0.50, 0.30, 150, 30, 2],
            ['Naranja', 'FRU003', 'Naranjas para jugo', 'unidad', null, 0.35, 0.20, 220, 50, 1],
            ['Kiwi', 'FRU004', 'Kiwi verde', 'unidad', null, 1.00, 0.70, 100, 20, 1],
            ['Espinaca', 'VER003', 'Espinacas frescas', 'unidad', null, 0.60, 0.40, 100, 15, 2],
            ['Pepino', 'VER004', 'Pepinos hidropónicos', 'unidad', null, 0.25, 0.15, 200, 30, 2],
            ['Pera', 'FRU005', 'Peras Bartlett', 'unidad', null, 0.50, 0.30, 150, 25, 1],
            ['Tomate', 'VER005', 'Tomates cherry', 'unidad', null, 0.20, 0.10, 250, 35, 2]
        ];

        foreach ($productos as $producto) {
            Producto::create([
                'nombre' => $producto[0],
                'cod_barra' => $producto[1],
                'descripcion' => $producto[2],
                'unidad' => $producto[3],
                'imagen' => $producto[4],
                'precio' => $producto[5],
                'costo_promedio' => $producto[6],
                'stock' => $producto[7],
                'stock_min' => $producto[8],
                'categoria_id' => $producto[9],
            ]);
        }

    }
}
