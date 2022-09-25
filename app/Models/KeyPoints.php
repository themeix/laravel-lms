<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KeyPoints extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'slug'
    ];


    public function courses()
    {
        return $this->belongsToMany(Course::class, 'learn_key_points', 'key_points_id', 'course_id');
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
