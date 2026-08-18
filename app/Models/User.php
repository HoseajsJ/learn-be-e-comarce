<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes, Notifiable;

    protected $fillable = [
        'name',
        'avatar',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'address',
        'is_verified',
        'is_active',
        'las_login',
    ];

    protected $hidden = [
        'password'
    ];
}
