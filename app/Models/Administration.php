<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;

    protected $fillable = ['photo','name','slug','designation','email','phone','office','degree','experience','contact','facebook','twitter','linkedin','youtube','joining_date','status'];
}
