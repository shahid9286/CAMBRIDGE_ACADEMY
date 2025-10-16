<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }
    
    public function settings()
    {
        return $this->hasMany(CourseSetting::class)->orderBy('order_no');
    }

    public function courseBlocks()
    {
        return $this->hasMany(CourseBlock::class);
    }

    public function courseElements()
    {
        return $this->hasMany(CourseElement::class);
    }

    public function courseCTAs()
    {
        return $this->hasMany(CourseCTA::class);
    }

    public function courseOutlines()
    {
        return $this->hasMany(CourseOutline::class);
    }

    public function courseFeatures()
    {
        return $this->hasMany(CourseFeature::class);
    }

    public function courseWhyChooseUs()
    {
        return $this->hasMany(CourseWhyChooseUs::class);
    }

    public function courseSections()
    {
        return $this->hasMany(CourseSection::class);
    }
}
