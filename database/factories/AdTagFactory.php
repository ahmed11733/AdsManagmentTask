<?php

namespace Database\Factories;

use App\Models\Ad;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ad_id    = Ad::pluck('id')->toArray();
        $tag_id    = Tag::pluck('id')->toArray();

        // $ad_id = Ad::inRandomOrder()->implode('id');
        // $tag_id = Tag::inRandomOrder()->implode('id');

        return [
            'ad_id' => $this->faker->randomElement($ad_id),
            'tag_id' => $this->faker->randomElement($tag_id),
        ];
    }
}
