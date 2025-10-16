<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobCandidate extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'resume',
        'cover_letter',
    ];

    public function job(){
        return $this->belongsTo(Job::class);
    }
}
