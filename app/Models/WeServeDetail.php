<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class WeServeDetail extends Model
{
        use HasFactory;

    protected $fillable = [
        'we_serve_id',
        'name',
        'logo'
    ];

    public function weServe()
    {
        return $this->belongsTo(WeServe::class, 'we_serve_id');
    }

}
