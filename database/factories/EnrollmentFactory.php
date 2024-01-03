<?php

namespace Database\Factories;

use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
            'user_id' => rand(1, 10), // Assuming you have 10 users
            'course_id' => rand(1, 10), // Assuming you have 10 courses
        ];
    }
}
