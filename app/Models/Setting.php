<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['phone_one','phone_two','main_email','support_email','video_url','fax','logo','favicon','link_one','link_two','link_three','link_four','link_five','copyright','address','facebook','twitter','linkedin','instagram','youtube'];
}
