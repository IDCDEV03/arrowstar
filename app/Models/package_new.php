<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class package_new extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'province_id',
        'package_id',
        'package_name',
        'program_spacial_req',
        'program_remark',
        'program_tips',
    ];
}
