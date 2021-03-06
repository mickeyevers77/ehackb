<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventSeed extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 6) as $item) {
            $event = Event::create([
                'title'             => $faker->text(24),
                'speaker'           => $faker->name,
                'short_description' => $faker->text(140),
                'long_description'  => $faker->text(500),
                'slots'             => $faker->numberBetween(1, 20) * 10,
                'starts_at'         => now(),
                'ends_at'           => now(),
            ]);

            $event->addMediaFromUrl($faker->imageUrl(960, 640, 'abstract'))->toMediaCollection('image');
        }
    }
}
