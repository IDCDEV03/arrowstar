<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program_travel_lists extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_province_id',
        'program_package_id',
        'program_travel_id',
        'program_day_count',
    ];
}
