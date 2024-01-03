<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description','instructor'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function videoViews()
    {
        return $this->hasMany(VideoView::class);
    }
}
