<?php

namespace Database\Factories;

use App\Models\VideoView;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoViewFactory extends Factory
{
    protected $model = VideoView::class;

    public function definition()
    {
        return [
            'user_id' => rand(1, 10), // Assuming you have 10 users
            'course_id' => rand(1, 10), // Assuming you have 10 courses
        ];
    }
}
