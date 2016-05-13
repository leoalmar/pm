<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \Illuminate\Database\Eloquent\Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ProjectNoteTableSeeder::class);
        $this->call(ProjectMembersTableSeeder::class);

        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
