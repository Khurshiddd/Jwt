<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1; $i<30;$i++){
            $user = User::find(rand(1,10));
            $product = Product::factory()->count(3)->create();
            $user->products()->attach($product);
        }
    }
}
