<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeServe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'description'];

    public function details()
    {
        return $this->hasMany(WeServeDetail::class, 'we_serve_id');
    }

}
