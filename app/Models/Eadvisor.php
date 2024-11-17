<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eadvisor extends Model
{
    use HasFactory;

    protected $fillable = ['publication_id','title','eadvisor_name','eadvisor_desig','eadvisor_dept','eadvisor_inst','status'];
}
