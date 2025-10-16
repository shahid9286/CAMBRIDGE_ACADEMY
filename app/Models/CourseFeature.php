<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseFeature extends Model
{
    public function details()
    {
        return $this->hasMany(CourseFeatureDetail::class, 'course_feature_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
