<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User_data extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_id',
        'username',
        'password',
        'user_fullname',
        'user_token',
        'isAdmin',
    ];
}
