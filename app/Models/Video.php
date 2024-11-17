<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_thumbnail',
        'title',
        'description',
        'embed_code'
        'date',
        'month',
        'year',
        'status',
    ];
}
