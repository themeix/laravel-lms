<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * @return bool
     */

    public function is_admin()
    {
        if ($this->type == 1) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */

    public function is_instructor()
    {
        if ($this->type == 2) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */

    public function is_student()
    {
        if ($this->type == 3) {
            return true;
        }
        return false;
    }


    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }


    public function courses()
    {
        return $this->hasMany(Course::class, 'user_id');
    }

    public function students()
    {
        return $this->hasMany(OrderItem::class, 'owner_user_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'owner_user_id', 'id');
    }



}
