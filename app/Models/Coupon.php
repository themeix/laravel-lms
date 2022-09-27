<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_code_name',
        'coupon_type',
        'status',
        'percentage',
        'coupon_code_name',
        'minimum_amount',
        'maximum_use_limit',
        'start_date',
        'end_date',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function couponCourses()
    {
        return $this->hasMany(CouponCourse::class);
    }

    public function couponInstructors()
    {
        return $this->hasMany(CouponInstructor::class);
    }


    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
            $model->creator_id =  auth()->id();
        });
    }
}
