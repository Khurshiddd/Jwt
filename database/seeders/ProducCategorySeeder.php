<?php

namespace Database\Seeders;

use App\Models\ProducCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProducCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProducCategory::create([
            'name'=>'Texnika',
        ]);
        ProducCategory::create([
            'name'=>'Kiyim',
        ]);
        ProducCategory::create([
            'name'=>'Oziq ovqat',
        ]);
    }
}
