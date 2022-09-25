<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'instructor_id',
        'category_id',
        'subcategory_id',
        'language_id',
        'difficulty_level_id',
        'title',
        'subtitle',
        'description',

        'description_footer',
        'feature_details',

        'price',
        'learner_accessibility',

        'image',
        'video',
        'slug',
        'status',
        'intro_video_check',
        'youtube_video_id'
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function difficultylevel()
    {
        return $this->belongsTo(DifficultyLevel::class, 'difficulty_level_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tags', 'course_id', 'tag_id');
    }




    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
            $model->user_id =  auth()->id();
            $model->instructor_id =  Auth::user()->instructor ? Auth::user()->instructor->id : null;
        });
    }
}
