<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Technology;
use illuminate\Support\Str;
class Project extends Model
{
    protected $guarded = [];
    use HasFactory;

    public static function generateSlug($val)
    {
        return Str::slug($val, '-');
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
