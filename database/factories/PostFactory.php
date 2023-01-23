<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $title = $this->faker->text(50);
        $slug = Str::slug($title, '-');

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \DavidBadura\FakerMarkdownGenerator\FakerProvider($faker));

        return [
            //

            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->realText(400, 3),
            'organization_id' => rand(1, 10),
            'user_id' => rand(1, 3)

        ];
    }
}
