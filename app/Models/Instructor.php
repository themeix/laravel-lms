<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_id',
        'province_id',
        'state_id',
        'city_id',
        'first_name',
        'last_name',
        'professional_title',
        'phone_number',
        'postal_code',
        'address',
        'about_me',
        'social_link',
        'slug',
        'gender',
        'cv_file',
        'cv_filename'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFullNameAttribute($value)
    {
        return $this->first_name.' '.$this->last_name;
    }




    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
