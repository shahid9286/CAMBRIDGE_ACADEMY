<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class SectionHeader extends Model
{
    use HasFactory, SoftDeletes;
        protected $table = 'section_headers';

    protected $fillable = [
        'title',
        'subtitle',
        'use_for',
        'description',
        'is_editable',
        'is_deleteable',
    ];
        protected $casts = [
        'is_editable' => 'boolean',
        'is_deleteable' => 'boolean',
    ];

}
