<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
     protected $fillable = [
        'about_thumbnail',
        'title',
        'description',
        'vision',
        'vision_details',
        'mission',
        'mission_details',
    ];
}
