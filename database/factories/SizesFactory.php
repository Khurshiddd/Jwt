<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sizes>
 */
class SizesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mass = ['xl','sm','lg','xxlg'];
        for($i=0; $i<4; $i++){
            $mas[]=$mass;
        }
        return [
            'size'=>'size',
            'code'=>array_rand($mas)
        ];
    }
}
