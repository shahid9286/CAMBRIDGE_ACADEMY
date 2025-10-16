<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobCity extends Model
{
     use SoftDeletes;

    protected $fillable = [
        'name',
        'country_id',
    ];

    // Relationship with JobCountry
    public function country()
    {
        return $this->belongsTo(JobCountry::class, 'country_id');
    }
}
