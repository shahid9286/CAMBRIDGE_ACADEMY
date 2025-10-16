<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureSectionDetail extends Model
{
    public function section()
    {
        return $this->belongsTo(FeatureSection::class, 'feature_section_id');
    }

}
