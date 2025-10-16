<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'description',
        'resume',
        'job_id'
    ];
    public function job()
    {
        return $this->belongsTo(JobVacancy::class,'job_id','id');
    }
}
