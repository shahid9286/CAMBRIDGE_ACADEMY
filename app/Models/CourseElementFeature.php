<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseElementFeature extends Model
{
    protected $fillable = [
        'course_element_id',
        'title',
        'description',
        'order_no',
    ];
}
