<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobCountry extends Model
{
   use SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
    ];

    public function cities()
{
    return $this->hasMany(JobCity::class, 'country_id');
}

}
