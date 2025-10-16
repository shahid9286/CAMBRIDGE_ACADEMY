<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
