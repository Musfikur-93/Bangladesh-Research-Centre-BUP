<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_slug',
    ];
    
    //subcategory models er sathe category models join korlam
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
