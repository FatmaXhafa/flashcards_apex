<?php

use Illuminate\Database\Seeder;

use App\User;

class UserCardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_user')->insert([
        	'user_id' => DB::table('users')->where('email', 'fnx170@aubg.edu')->first()->id,
        	'card_id' => 1,
        	'score'   => 0
        ]);
    }
}
