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
        
        //php artisan migrate:refresh --seed        
        //$this->call(UsersTableSeeder::class);
        User::create(array(
                'email' => 'francuchin@gmail.com',
                'first_name' => 'Jean',
                'last_name' => 'Aramburu',
                'password' => md5('1234'),
            ));
        $faker = Faker\Factory::create('es_ES');
        for ($i = 0; $i < 9; $i++)
        {
            User::create(array(
                'email' => $faker->unique()->email,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'password' => md5($faker->word),
            ));
        }
    }
}
