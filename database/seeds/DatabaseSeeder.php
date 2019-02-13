<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker=\Faker\Factory::create();    
        for($i=0; $i<10; $i++){
            DB::table('student')->insert([
                'imie' => str_random(10),
                'nazwisko' => str_random(10),
                'data_urodzenia' => $faker->date(),
                'wiek' => rand(6,24),
                'klasa' => rand(1,8),
                'plec' => rand(0,1),
                'ocena' => rand(1,6),
                'pesel' => rand(111111111,999999999)
            ]);
            }
            
        $oceny = ['niedostateczny', 'dopuszczający', 'dostateczny', 'dobry', 'bardzo dobry', 'celujący'];
        for($i=1;$i<=6;$i++){
            DB::table('ocena')->insert([
                'ocena' => $i,
                'nazwa' => $oceny[$i-1]
            ]);
        }
        }
    }
