<?php

namespace Database\Factories;

use App\Models\PdfResource;
use Illuminate\Database\Eloquent\Factories\Factory;

class PDFResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PDFResource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
        ];
    }
}
