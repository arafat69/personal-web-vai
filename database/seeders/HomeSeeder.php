<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Home;
use App\Models\Teaching;
use Faker\Factory;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Home
        Home::create([
            'title' => 'Rejaul Haque Kawshik',
            'description' => $faker->paragraph(3)
        ]);

        // About
        About::create([
            'title' => 'About',
            'description' => $faker->paragraph(4)
        ]);

        // Course
        Course::create([
            'title' => 'Course Information',
            'description' => $faker->paragraph(3)
        ]);

        // Curriculum
        Curriculum::create([
            'title' => 'Curriculum Vitae & Research',
            'description' => $faker->paragraph(5)
        ]);

        // Teaching
        Teaching::create([
            'title' => 'Teaching Philosophy',
            'description' => $faker->paragraph(6)
        ]);
    }
}
