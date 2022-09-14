<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];



    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
