<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeed::class);
        $this->call(NewsSeed::class);
        $this->call(EventSeed::class);
        $this->call(SponsorSeed::class);
    }
}
