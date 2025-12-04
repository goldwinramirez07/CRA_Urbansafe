<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'report_type',
        'location',
        'latitude',
        'longitude',
        'datetime',
        'description',
        'media_path',
        'status',
        'user_id',
    ];
}
