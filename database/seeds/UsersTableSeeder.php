<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Fatma Xhafa',
            'email' => 'fnx170@aubg.edu',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mike Diamond',
            'email' => 'mike.diamond@apex.com',
            'password' => bcrypt('admin'),
        ]);
    }
}