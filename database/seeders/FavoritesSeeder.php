<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorite;

class FavoritesSeeder extends Seeder
{
    public function run(): void
    {
        Favorite::create(['user_id' => 2, 'product_id' => 1]);
        Favorite::create(['user_id' => 2, 'product_id' => 2]);
    }
}
