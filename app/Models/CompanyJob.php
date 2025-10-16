<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyJob extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
        'introduction',
        'email',
        'website',
        'phone',
        'location'
    ];

    public function vacancies()
    {
        return $this->hasMany(JobVacancy::class, 'company_jobs_id');
    }
}
