<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Type extends Model
{
    protected $guarded = [];
    use HasFactory;

    public static function generateSlug($val)
    {
        return Str::slug($val, '-');
    }

    public function project() {
        return $this->hasMany(Project::class);
    }
}
