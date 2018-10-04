<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use DesignMyNight\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    //protected $connection = 'mongodb';
    protected $collection = 'users';
    protected $primaryKey = "_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '_id',
        'name',
        'email',
        'avatar',
        'phone',
        'password',
        'status',
        'is_vip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
