<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoSection extends Model
{
    
    public function features()
    {
        return $this->hasMany(InfoSectionFeature::class);
    }
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
