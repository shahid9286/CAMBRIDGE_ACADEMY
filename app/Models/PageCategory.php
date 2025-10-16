<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    protected $fillable = [
        'title',
        'description',
        'hero_title',
        'hero_sub_title',
        'hero_description',
        'slug',
        'image',
        'hero_image',
        'status',
        'order_no',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
