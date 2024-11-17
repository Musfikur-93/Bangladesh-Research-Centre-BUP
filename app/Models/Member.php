<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'm_thumbnial',
        'm_title',
        'm_name',
        'm_designation',
        'steering_committee',
        'finance_committee',
        'syndicate_committee',
        'seneate_committee',
        'academic_councile',
        'status',
    ];
}
