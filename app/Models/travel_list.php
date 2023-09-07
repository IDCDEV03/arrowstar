<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class travel_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'travel_id',
        'province',
        'travel_name',
        'travel_detail',
    ];
}
