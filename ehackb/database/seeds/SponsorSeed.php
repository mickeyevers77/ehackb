<?php

use App\Sponsor;
use Illuminate\Database\Seeder;

class SponsorSeed extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        $sponsor = Sponsor::create([
            'title' => 'Lenovo',
            'link'  => 'https://www.lenovo.com/be/nl/',
        ]);
        $sponsor->addMediaFromUrl($faker->imageUrl(960, 640, 'abstract'))->toMediaCollection('image');

        $sponsor = Sponsor::create([
            'title' => 'Signpost',
            'link'  => 'http://www.signpost.be/',
        ]);
        $sponsor->addMediaFromUrl($faker->imageUrl(960, 640, 'abstract'))->toMediaCollection('image');

        $sponsor = Sponsor::create([
            'title' => 'AcademicShop',
            'link'  => 'https://www.academicshop.be/',
        ]);
        $sponsor->addMediaFromUrl($faker->imageUrl(960, 640, 'abstract'))->toMediaCollection('image');

    }
}
