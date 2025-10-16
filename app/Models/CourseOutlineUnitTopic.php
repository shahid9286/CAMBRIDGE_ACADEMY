<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseOutlineUnitTopic extends Model
{
    protected $fillable = ['course_outline_unit_id', 'title'];
    
    public function unit()
    {
        return $this->belongsTo(CourseOutlineUnit::class);
    }
}
