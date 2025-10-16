<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseWhyChooseUs extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function details()
    {
        return $this->hasMany(CourseWhyChooseUsDetail::class);
    }
}
