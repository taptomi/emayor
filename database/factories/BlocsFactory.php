<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blocs>
 */
class BlocsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $text=$this->faker->text(50);
        $slug=Str::slug($text,'-');
        return [
            'organization_id'=>rand(1,10),
            'shortname'=>$slug,
            'content'=>$this->faker->text(250)
        ];
    }
}
