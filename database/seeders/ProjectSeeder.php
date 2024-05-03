<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 24; $i++){
            $newProject = new Project();
            $newProject->name = $faker->unique()->word();
            $newProject->slug = Str::slug($newProject->name);
            $newProject->description = $faker->paragraph();
            $newProject->github = $faker->url();
            $newProject->type_id = $faker->numberBetween(1, 4);
            $newProject->save();
        }
    }
}
