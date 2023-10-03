<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_fullname',
            'user_address',
            'user_province',
            'user_phone',
            'user_datetravel',
            'user_program',
            'user_amount',
            'user_remark',
    ];
}
