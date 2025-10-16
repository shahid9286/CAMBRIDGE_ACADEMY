<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobType extends Model
{
    use  SoftDeletes;

    protected $fillable = [
        'title',
    ];
    public function vacancies()
    {
        return $this->hasMany(JobVacancy::class, 'job_types_id');
    }
}
