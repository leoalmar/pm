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

        factory(App\Entities\User::class)->create([
            'name' => 'leoalmar',
            'email' => 'leonardoxsystems@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
        factory(App\Entities\User::class,10)->create();
    }
}
