<?php

namespace Database\Factories;

use App\Models\LinkResource;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LinkResource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(12),
            'link' => $this->faker->url(),
            'is_open_new_tab' => $this->faker->boolean(),
        ];
    }
}
