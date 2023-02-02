<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::factory(10)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\Advertiser::factory(10)->create();
        \App\Models\Ad::factory(10)->create();
        \App\Models\AdTag::factory(10)->create();
    }
}
