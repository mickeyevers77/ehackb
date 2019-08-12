<?php

use App\Sponsor;
use Illuminate\Database\Seeder;

class SponsorSeed extends Seeder
{
    public function run()
    {
        Sponsor::create([
            'title' => 'Lenovo',
            'link'  => 'https://www.lenovo.com/be/nl/',
        ]);

        Sponsor::create([
            'title' => 'Signpost',
            'link'  => 'http://www.signpost.be/',
        ]);

        Sponsor::create([
            'title' => 'AcademicShop',
            'link'  => 'https://www.academicshop.be/',
        ]);
    }
}
