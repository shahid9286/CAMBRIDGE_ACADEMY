<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobVacancy extends Model
{
       use SoftDeletes;

    protected $fillable = [
        // FKs
        'company_jobs_id',
        'job_types_id',
        'industry_jobs_id',
        'job_cities_id',
        'job_countries_id',
        'job_experiences_id',

        // Job info
        'title',
        'thumbnail',
        'gender',
        'min_age',
        'max_age',
        'description',
        'job_vacancy',
        'is_active',
        

        // Salary
        'salary_min',
        'salary_max',

        // Contact
        'email',
        'contact_no',
        'whatsapp_no',
        'website',
        'location',

        // Dates
        'post_date',
        'deadline',

        // Details
        'job_details',
    ];

    protected $casts = [
        'post_date'   => 'date',
        'deadline'    => 'date',
        'is_active'   => 'boolean',
        'salary_min'  => 'decimal:2',
        'salary_max'  => 'decimal:2',
        'min_age'     => 'integer',
        'max_age'     => 'integer',
        'job_vacancy' => 'integer',
    ];

    // Relationships
    public function country()
    {
        return $this->belongsTo(JobCountry::class, 'job_countries_id');
    }

    public function city()
    {
        return $this->belongsTo(JobCity::class, 'job_cities_id');
    }

   public function experience()
    {
        return $this->belongsTo(JobExperience::class, 'job_experiences_id');
    }
    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'job_types_id');
    }

    public function industry()
    {
        return $this->belongsTo(IndustryJob::class, 'industry_jobs_id');
    }
    
    public function company()
    {
        return $this->belongsTo(CompanyJob::class, 'company_jobs_id');
    }

   
}
