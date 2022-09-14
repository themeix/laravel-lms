<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CourseCategory extends Model
{
    use HasFactory;

    protected $table = 'course_categories';

    protected $fillable = [
        'name',
        'image',
        'is_feature',
        'slug',
    ];


    public function sub_categories()
    {
        return $this->hasMany(Subcategory::class);
    }


    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}

