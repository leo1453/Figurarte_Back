<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'Rem - Re:Zero 1/7 Scale Figure',
                'descripcion' => 'Figura premium de Rem detallada en 1/7 escala.',
                'precio' => 2499.00,
                'imagen' => 'rem.jpg',
                'stock' => 20,
                'categoria' => 'Anime'
            ],
            [
                'nombre' => 'Megumin Explosion Figure',
                'descripcion' => 'Figura de Megumin lanzando su famoso Explosion.',
                'precio' => 2899.00,
                'imagen' => 'megumin.jpg',
                'stock' => 15,
                'categoria' => 'Anime'
            ],
            [
                'nombre' => 'Saber Artoria - Fate/Stay Night',
                'descripcion' => 'Figura de Saber con armadura completa.',
                'precio' => 3099.00,
                'imagen' => 'saber.jpg',
                'stock' => 10,
                'categoria' => 'Anime'
            ],
            [
                'nombre' => 'Hatsune Miku Snow Version',
                'descripcion' => 'Figura edición limitada Snow Miku.',
                'precio' => 3299.00,
                'imagen' => 'snow_miku.jpg',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
        ];

        foreach ($productos as $p) {
            Product::create($p);
        }
    }
}
