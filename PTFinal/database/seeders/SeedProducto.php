<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedProducto extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = ['1','2','3','4','5'];
        $tipos = [];
        $tamanos = [];
        for ($i = 0; $i <= 19; $i++) {
            DB::table('productos')->insert([
                'id' => 0,
                'nombre' => '',
                'descripcion' => 'Producto generico en nuestra tienda' + $i,
                'unidades' => rand(1, 999),
                'precio_unitario' => rand(100, 100000) / 100,
                'categoria' => '',
            ]);
        }
    }
}
