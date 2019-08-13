<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        User::create([
            'first_name' => 'Mickey',
            'last_name'  => 'Evers',
            'email'      => 'admin@test.be',
            'password'   => bcrypt('admin@test.be'),
            'is_admin'   => true,
        ]);

        User::create([
            'first_name' => $faker->firstName,
            'last_name'  => $faker->lastName,
            'email'      => 'user@test.be',
            'password'   => bcrypt('user@test.be'),
            'is_admin'   => false,
        ]);
    }
}
