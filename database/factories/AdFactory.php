<?php

namespace Database\Factories;

use App\Models\Advertiser;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = array(
            'free',
            'paid',
        );
        $category_id    = Category::pluck('id')->toArray();
        $advertiser_id  = Advertiser::pluck('id')->toArray();

        // $category_id = Category::inRandomOrder()->implode('id');
        // $advertiser_id= Advertiser::inRandomOrder()->implode('id');
        return [
            'title' => $this->faker->word(),
            'type' => $types[rand(0,1)] ,
            'description' => $this->faker->paragraph(),
            'category_id' => $this->faker->randomElement($category_id),
            'advertiser_id' => $this->faker->randomElement($advertiser_id),
            'start_date' => $this->faker->date(),
        ];
    }
}
