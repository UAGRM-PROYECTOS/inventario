<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::create(['nombre' => 'PENDIENTE/EN PROCESO']);
        Estado::create(['nombre' => 'PAGADO']);
        Estado::create(['nombre' => 'REVERTIDO']);
        Estado::create(['nombre' => 'ANULADO']);
        Estado::create(['nombre' => 'PEDIDO']);
        Estado::create(['nombre' => 'VENDIDO']);
        Estado::create(['nombre' => 'ENTREGADO']);
        Estado::create(['nombre' => 'ENVIADO']);

    }
}
