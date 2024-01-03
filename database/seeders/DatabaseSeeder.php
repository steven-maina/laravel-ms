<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\VideoView;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 courses
        Course::factory(10)->create();

        // Create 10 users
        User::factory(10)->create();

        // Enroll users in courses (randomly)
        Enrollment::factory(20)->create();

        // Simulate video views (randomly)
        VideoView::factory(30)->create();
    }
}
