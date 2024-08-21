<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Instructor;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructor = Instructor::first();
        Course::factory()->count(49)->create([
            'name' => 'Example Course',
            'content' => 'Example Content',
            'price' => 19.99,
            'duration' => 30,
            'instructor_name' => $instructor->name,
        ]);
    }
}
