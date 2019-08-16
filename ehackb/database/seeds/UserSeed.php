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
            'email'      => 'admin@ehackb.be',
            'password'   => bcrypt('12345'),
            'is_admin'   => true,
        ]);

        User::create([
            'first_name' => $faker->firstName,
            'last_name'  => $faker->lastName,
            'email'      => 'gebruiker@ehackb.be',
            'password'   => bcrypt('67890'),
            'is_admin'   => false,
        ]);
    }
}
