<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Country extends Model
{
    use HasFactory;

    protected  $table = 'countries';
    protected  $primaryKey = 'id';
    protected $fillable = [
        'short_name',
        'country_name',
        'flag',
        'slug',
        'phonecode',
        'continent',
    ];

    public function states()
    {
        return $this->hasMany(State::class, 'country_id');
    }


    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
