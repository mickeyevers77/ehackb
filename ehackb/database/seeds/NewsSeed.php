<?php

use App\News;
use Illuminate\Database\Seeder;

class NewsSeed extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 6) as $item) {
            News::create([
                'title'             => $faker->text(24),
                'short_description' => $faker->text(140),
                'long_description'  => $faker->paragraphs(3, true),
                'published_at'      => now()
            ]);
        }
    }
}
