<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'original' => "amarillo",
            'target' => "yellow",
            'difficulty' => 1,
            'rangemin' => 0.000,
            'rangemax' => 1.000
        ]);

        DB::table('cards')->insert([
            'original' => "manzana" ,
            'target' => "apple",
            'difficulty' => 1,
            'rangemin' => 1.001,
            'rangemax' => 2.000
        ]);

        DB::table('cards')->insert([
            'original' => "ordenador",
            'target' => "computer",
            'difficulty' => 1,
            'rangemin' => 2.001,
            'rangemax' => 3.000
        ]);

        DB::table('cards')->insert([
            'original' => "verde",
            'target' => "green",
            'difficulty' => 1,
            'rangemin' => 3.001,
            'rangemax' => 4.000
        ]);

        DB::table('cards')->insert([
            'original' => "vino",
            'target' => "wine",
            'difficulty' => 1,
            'rangemin' => 4.001,
            'rangemax' => 5.000
        ]);

        DB::table('cards')->insert([
            'original' => "nuevo",
            'target' => "new",
            'difficulty' => 1,
            'rangemin' => 5.001,
            'rangemax' => 6.000
        ]);

        DB::table('cards')->insert([
            'original' => "casa",
            'target' => "house",
            'difficulty' => 1,
            'rangemin' => 6.001,
            'rangemax' => 7.000
        ]);

        DB::table('cards')->insert([
            'original' => "playa",
            'target' => "beach",
            'difficulty' => 1,
            'rangemin' => 7.001,
            'rangemax' => 8.000
        ]);

        DB::table('cards')->insert([
            'original' => "juegos",
            'target' => "games",
            'difficulty' => 1,
            'rangemin' => 8.001,
            'rangemax' => 9.000
        ]);

        DB::table('cards')->insert([
            'original' => "cerveza",
            'target' => "beer",
            'difficulty' => 1,
            'rangemin' => 9.001,
            'rangemax' => 10.000
        ]);

    }
}
