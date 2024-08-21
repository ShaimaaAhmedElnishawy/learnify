<?php

namespace Database\Factories;

// database/factories/CourseFactory.php

use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        $instructor = Instructor::factory()->create();
        return [
            'name' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'duration' => $this->faker->randomFloat(2, 1, 12),
            'instructor_id' => $instructor->id,
            'instructor_name' => $instructor->name,
        ];
    }
}

 
?>
