<?php

namespace Database\Seeders;

use App\Models\Colors;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Colors::factory()->count(5)->create();
    }
}
