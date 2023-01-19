<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PublicDocument>
 */
class PublicDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fakefile=$this->faker->text(15);
        $filename=Str::slug($fakefile,'-').'.'.$this->faker->text(5);

        return [
            'organization_id'=>rand(0,10),
            'category_id'=>rand(0,6),
            'title'=>$this->faker->text(15),
            'filename'=>$filename
        ];
    }
}
