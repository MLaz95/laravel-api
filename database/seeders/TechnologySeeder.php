<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = ['html', 'css', 'javascript', 'php', 'vue', 'vite', 'bootstrap', 'laravel'];

        foreach($technologies as $tech){
            $newTechnology = new Technology();
            $newTechnology->title = $tech;
            $newTechnology->color = $faker->safeHexColor();
            $newTechnology->save();
        }
    }
}
