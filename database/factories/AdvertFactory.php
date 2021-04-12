<?php

namespace Database\Factories;

use App\Models\Advert;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdvertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText(30);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->realText(250),
            'province' => $this->faker->state,
            'city' => $this->faker->city,
            'contact_email' => $this->faker->email,
            'contact_number' => $this->faker->e164PhoneNumber,
            'price' => $this->faker->numberBetween(200, 3000),
            'category_id' => $this->faker->numberBetween(1,4),
            'image_path' => $this->faker->image('public/storage/images', 640,480, null, false)
        ];
    }
}
