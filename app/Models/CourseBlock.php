<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseBlock extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function features()
    {
        return $this->hasMany(CourseBlockFeature::class);
    }
}
