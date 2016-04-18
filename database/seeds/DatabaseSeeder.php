<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create('es_ES');
        for ($i = 0; $i < 60; $i++)
        {
            $user = User::create(array(
                'email' => $faker->unique()->email,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'password' => md5($faker->word),
            ));
        }
    }
}
