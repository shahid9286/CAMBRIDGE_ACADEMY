<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSetting extends Model
{
    protected $fillable= ['course_id', 'reference_id', 'reference_type', 'order_no'];

    public function reference()
    {
        return $this->morphTo();
    }
}
