<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'meta_title',
        'meta_author',
        'meta_tag',
        'meta_description',
        'meta_keyword',
        'google_verification',
        'google_analytics',
        'google_adsense',
        'alexa_verification',
    ];
}
