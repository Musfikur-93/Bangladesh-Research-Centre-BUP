<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crs extends Model
{
    use HasFactory;

    protected $fillable = ['cr_image','cr_name','slug','cr_designation','cr_atitle','cr_amessage','cr_profile','cr_degree','cr_experience','cr_dept','cr_ctitle','cr_email','cr_phone','cr_facebook','cr_twitter','cr_linkedin','cr_instagram','cr_youtube','cr_stitle','cr_slanguage','cr_steam','cr_sdevelopment','cr_sdesign','cr_sinnovation','cr_scommunication','cr_joining','cr_month','cr_year','status'];
}
