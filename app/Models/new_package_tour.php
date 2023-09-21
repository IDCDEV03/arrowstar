<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class new_package_tour extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'package_id',
        'program_place',
    ];
}