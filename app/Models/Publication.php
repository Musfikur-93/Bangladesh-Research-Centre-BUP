<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = ['publication_name','publication_slug','publication_image','publication_file','chiefpatron_title','chiefpatron_message','chiefpatron_name','chiefpatron_desig','chiefpatron_dept','chiefpatron_inst','chipatron_name','chipatron_desig','chipatron_dept','chipatron_inst','patron_name','patron_desig','patron_dept','patron_inst','editor_title','editor_note','editor_name','editor_desig','editor_dept','editor_inst','chiefeditor_name','chiefeditor_desig','chiefeditor_dept','chiefeditor_inst','issue_date','month','year','status'];
}
