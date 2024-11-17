<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publication;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = ['publication_id','title','date','year','month'];


    //archive models er sathe publication models join korlam
    public function publication(){
        return $this->belongsTo(Publication::class);
    }
}
