<?php

use Illuminate\Database\Seeder;

class ProjectMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\ProjectMember::class)->create([
            'project_id' => 1,
            'member_id' => 1
        ]);

        factory(App\Entities\ProjectMember::class,10)->create();
    }
}
