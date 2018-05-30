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
        //Seeder to create Admin for testing Purposes
        DB::table('users')->insert([
            'fullname' => 'Test Admin',
            'telephone' => '233548797248',
            'nationality' => 'Ghanaian',
            'is_admin' => 1,
            'email' => 'appgharage@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
