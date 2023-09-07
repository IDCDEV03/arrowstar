<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class travel_img extends Model
{
    use HasFactory;
    protected $fillable = [
        'travel_id',
        'travel_img',
    ];
}
