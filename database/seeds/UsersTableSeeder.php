<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 60; $i++)
        {
            $user = User::create(array(
                'email' => $faker->unique()->email,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'password' => $faker->hash(word),
            ));
        }

    }
}
