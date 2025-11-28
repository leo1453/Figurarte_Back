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
                'nombre' => 'Yokoyama Ishimi',
                'descripcion' => 'Ilustración de anime Yokoyama Ishimi Figura de dibujos animados Modelo Estatua Ashigechan Figura de escritorio Original Arte Pintura Figuras Decoración de escritorio',
                'precio' => 2499.00,
                'imagen' => 'https://m.media-amazon.com/images/I/51+V47U323L._AC_SX679_.jpg',
                'stock' => 20,
                'categoria' => 'Anime'
            ],
            [
                'nombre' => 'ShinomiyaKanna',
                'descripcion' => 'ShinomiyaKanna cifras ilustrativas de anime, figura original de pintura, figura de belleza, niña, anime, figura de acción, 9.45 pulgadas',
                'precio' => 2899.00,
                'imagen' => 'https://m.media-amazon.com/images/I/41pqASUlhUL._AC_SX679_.jpg',
                'stock' => 15,
                'categoria' => 'Anime'
            ],
            [
                'nombre' => 'Ashigechan',
                'descripcion' => 'Ilustración Ashigechan Figura de 18 cm Sexy Bunny Girl Estatua Original Figura de Pintura Figura de Anime Lascivo Coleccionable - Decoración de computadora Regalos para Fans',
                'precio' => 3099.00,
                'imagen' => 'https://m.media-amazon.com/images/I/51u45MvunkL._AC_SX679_.jpg',
                'stock' => 10,
                'categoria' => 'Anime'
            ],
            [
                'nombre' => 'LUNK RN',
                'descripcion' => 'LUNK RN Pola cifras Anime Girl Figura Traje de baño versión 16 cm Figurita coleccionable RN Pola cifras de Acción Decoración de computadora Regalos para Fans',
                'precio' => 3299.00,
                'imagen' => 'https://m.media-amazon.com/images/I/51wZi-1KDTL._AC_SY300_SX300_QL70_ML2_.jpg',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'LUNK RN',
                'descripcion' => 'LUNK RN Pola cifras Anime Girl Figura Traje de baño versión 16 cm Figurita coleccionable RN Pola cifras de Acción Decoración de computadora Regalos para Fans',
                'precio' => 3299.00,
                'imagen' => 'https://m.media-amazon.com/images/I/51wZi-1KDTL._AC_SY300_SX300_QL70_ML2_.jpg',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'LUNK RN',
                'descripcion' => 'LUNK RN Pola cifras Anime Girl Figura Traje de baño versión 16 cm Figurita coleccionable RN Pola cifras de Acción Decoración de computadora Regalos para Fans',
                'precio' => 3299.00,
                'imagen' => 'https://m.media-amazon.com/images/I/51wZi-1KDTL._AC_SY300_SX300_QL70_ML2_.jpg',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'LUNK RN',
                'descripcion' => 'LUNK RN Pola cifras Anime Girl Figura Traje de baño versión 16 cm Figurita coleccionable RN Pola cifras de Acción Decoración de computadora Regalos para Fans',
                'precio' => 3299.00,
                'imagen' => 'https://m.media-amazon.com/images/I/51wZi-1KDTL._AC_SY300_SX300_QL70_ML2_.jpg',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'LUNK RN',
                'descripcion' => 'LUNK RN Pola cifras Anime Girl Figura Traje de baño versión 16 cm Figurita coleccionable RN Pola cifras de Acción Decoración de computadora Regalos para Fans',
                'precio' => 3299.00,
                'imagen' => 'https://m.media-amazon.com/images/I/51wZi-1KDTL._AC_SY300_SX300_QL70_ML2_.jpg',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'LUNK RN',
                'descripcion' => 'LUNK RN Pola cifras Anime Girl Figura Traje de baño versión 16 cm Figurita coleccionable RN Pola cifras de Acción Decoración de computadora Regalos para Fans',
                'precio' => 3299.00,
                'imagen' => 'https://m.media-amazon.com/images/I/51wZi-1KDTL._AC_SY300_SX300_QL70_ML2_.jpg',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'LUNK RN',
                'descripcion' => 'LUNK RN Pola cifras Anime Girl Figura Traje de baño versión 16 cm Figurita coleccionable RN Pola cifras de Acción Decoración de computadora Regalos para Fans',
                'precio' => 3299.00,
                'imagen' => 'https://m.media-amazon.com/images/I/51wZi-1KDTL._AC_SY300_SX300_QL70_ML2_.jpg',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
        ];

        foreach ($productos as $p) {
            Product::create($p);
        }
    }
}
