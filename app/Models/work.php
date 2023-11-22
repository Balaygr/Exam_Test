<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class work extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_work',
        'name_work',
        'time_start',
        'time_end',
        'status'
    ];
}
