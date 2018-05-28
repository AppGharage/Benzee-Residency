<?php

use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(BenZee\User::class, 10)->create()->each(function ($u) {
            $u->requests()->save(factory(BenZee\Request::class)->make());
        });
    }
}
