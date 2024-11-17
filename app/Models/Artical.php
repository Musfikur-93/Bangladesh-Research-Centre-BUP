<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Publication;

class Artical extends Model
{
    use HasFactory;

    protected $fillable = ['author_id','publication_id','artical_title','title','slug','view','file','date','month','year','status'];


    //artical models er sathe author models join korlam
    public function author(){
        return $this->belongsTo(Author::class);
    }

    //artical models er sathe publication models join korlam
    public function publication(){
        return $this->belongsTo(Publication::class);
    }

    
}
