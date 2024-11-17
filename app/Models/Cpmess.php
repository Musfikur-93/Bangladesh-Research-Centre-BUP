<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpmess extends Model
{
    use HasFactory;

    protected $fillable = ['cp_title','cp_image','cp_message','cp_regards','cp_name','cp_designation','cp_organization'];
}
