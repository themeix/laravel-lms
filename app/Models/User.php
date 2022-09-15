<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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


}
