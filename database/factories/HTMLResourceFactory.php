<?php

namespace Database\Factories;

use App\Models\HTMLResource;
use Illuminate\Database\Eloquent\Factories\Factory;

class HTMLResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HTMLResource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(50),
            'description' => $this->faker->paragraph(),
            'snippet' => $this->faker->randomHtml(),
        ];
    }
}
