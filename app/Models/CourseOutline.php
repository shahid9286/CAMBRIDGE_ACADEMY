<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseOutline extends Model
{
    protected $fillable = ['course_id', 'title', 'subtitle', 'description'];

    public function units()
    {
        return $this->hasMany(CourseOutlineUnit::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
