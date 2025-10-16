<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseOutlineUnit extends Model
{
    protected $fillable = ['course_outline_id', 'title'];

    public function outline()
    {
        return $this->belongsTo(CourseOutline::class);
    }

    public function topics()
    {
        return $this->hasMany(CourseOutlineUnitTopic::class);
    }
}
