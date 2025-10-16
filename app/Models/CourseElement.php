<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseElement extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function features()
    {
        return $this->hasMany(CourseElementFeature::class);
    }
}
