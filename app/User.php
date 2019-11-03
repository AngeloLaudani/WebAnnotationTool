<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->admin;
    }

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    public function annotations()
    {
        return $this->hasMany(Annotation::class);
    }

    public function user_picture()
    {
        return $this->hasOne(UserPicture::class);
    }
}
