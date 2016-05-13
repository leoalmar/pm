<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Entities\Project::truncate();
        factory(App\Entities\Project::class,10)->create();
        factory(App\Entities\ProjectMember::class)->create([
            'project_id' => 1,
            'member_id' => 1
        ]);
    }
}
