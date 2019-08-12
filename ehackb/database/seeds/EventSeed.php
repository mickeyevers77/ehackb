<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventSeed extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 6) as $item) {
            Event::create([
                'title'             => $faker->text(24),
                'speaker'           => $faker->name,
                'short_description' => $faker->text(140),
                'long_description'  => $faker->paragraphs(3, true),
                'slots'             => $faker->numberBetween(1, 20) * 10,
                'starts_at'         => now(),
                'ends_at'           => now(),
            ]);
        }
    }
}
