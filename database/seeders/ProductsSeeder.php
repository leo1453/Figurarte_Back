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
                'nombre' => 'Victory Nikke - Nero',
                'descripcion' => 'Nuestros amigos de Sega, traen a los personajes más icónicos, una manera única e increíble, respetando detalles y fabricados con la más alta calidad. ¡Estamos seguros de que te encantará!',
                'precio' => 1299.00,
                'imagen' => 'https://www.distritomax.com/cdn/shop/files/001_1ee46847-b3d1-4334-bece-96dbf7d25611_1334x1400.jpg?v=1760032945',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'Victory Nikke - Viper',
                'descripcion' => 'Nuestros amigos de Sega, traen a los personajes más icónicos, una manera única e increíble, respetando detalles y fabricados con la más alta calidad. ¡Estamos seguros de que te encantará!',
                'precio' => 1299.00,
                'imagen' => 'https://www.distritomax.com/cdn/shop/files/106_c3526f98-ada7-44b8-8916-22e5bec39c88_1334x1400.jpg?v=1760032881',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'Nami Swim',
                'descripcion' => 'Nuestros amigos de Megahouse, traen a los personajes más icónicos, una manera única e increíble, respetando detalles y fabricados con la más alta calidad. ¡Estamos seguros de que te encantará!',
                'precio' => 3299.00,
                'imagen' => 'https://www.distritomax.com/cdn/shop/files/847226_1197x1197.jpg?v=1757087198',
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'Makima',
                'descripcion' => 'Desde la popular y exitosa serie de manga Chainsaw Man, nuestros colegas de Sega revelan su nuevo mini peluche dedicado a la seria y calmada Makima, que se une a la línea de peluches Nesoberi Lay Down. Este lindo mini peluche ha sido fabricado con la más alta calidad y diseñado meticulosamente para que fanáticos y coleccionistas puedan llevarlo a casa y engrandecer su bestial colección de peluches. ¡No te pierdas la oportunidad de tener a Makima en tu colección!',
                'imagen' => 'https://www.distritomax.com/cdn/shop/files/1_830c2ab8-44a9-4ec2-87bb-a96327a38b86_1334x1400.jpg?v=1726167754',
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'Bakugo',
                'descripcion' => 'La estatua de Katsuki Bakugo también conocida como Kacchan mide aproximadamente 6.7 pulgadas de alto en la cual no se escatimaron en detalles para elaborar esta figura enérgica. Bakugo se muestra con su traje de héroe característico inspirado en la última temporada.',
                'precio' => 599.00,
                'imagen' => 'https://www.distritomax.com/cdn/shop/files/29373-MY-HERO-ACADEMIA-MAXIMATIC-KATSUKI-BAKUGO-01_1197x1197.jpg?v=1740764643',
                'categoria' => 'Vocaloid'
            ],
             [
                'nombre' => 'Satoru Gojo',
                'descripcion' => 'Así es, planificado y producido por MegaHouse, Satoru Gojo se une a la serie de figuras Look Up. La serie de figuras de Look Up se posan en posturas sentadas mirando hacia arriba, lo que permite que se muestren a su lado siempre mirándolo a los ojos. Los cuellos también están equipados con una articulación para que siempre puedan mirarlo directamente.',
                'imagen' => 'https://www.distritomax.com/cdn/shop/files/835889_1260x1400.jpg?v=1757090869',
                'precio' => 599.00,
                'stock' => 8,
                'categoria' => 'Vocaloid'
            ],
        ];

        foreach ($productos as $p) {
            Product::create($p);
        }
    }
}
