<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Challenge;
use App\Participacion;
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
        User::create(array(
                'email' => 'pedro@romero.com',
                'first_name' => 'Virgilio',
                'last_name' => 'Romero',
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
        for ($i = 0; $i < 9; $i++)
        {
            Challenge::create(array(
                    'title' => $faker->realText($maxNbChars = 10, $indexSize = 2),
                    'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                    'id_user' =>1
                ));
        }
        for ($i = 0; $i < 3; $i++)
        {
            Challenge::create(array(
                    'title' => 'Desafio N°'.$i,
                    'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                    'id_user' =>2
                ));
            Challenge::create(array(
                    'title' => $faker->realText($maxNbChars = 10, $indexSize = 2),
                    'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                    'id_user' =>3
                ));
        }
        for ($i = 0; $i < 3; $i++)
        {
            Challenge::create(array(
                    'title' => $faker->realText($maxNbChars = 10, $indexSize = 2),
                    'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                    'id_user' =>5
                ));
            Challenge::create(array(
                    'title' => $faker->realText($maxNbChars = 10, $indexSize = 2),
                    'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                    'id_user' =>7
                ));
        }

        Participacion::create(array(
                'title'=>'Primer titulo participacion',
                'video'=>'I4g1_fv0pSY',
                'description'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
                'id_user'=>2,
                'id_challenge'=>21
            ));
        Participacion::create(array(
                'title'=>'Segundo titulo participacion',
                'video'=>'I4g1_fv0pSY',
                'description'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
                'id_user'=>1,
                'id_challenge'=>21
            ));

    }

}
