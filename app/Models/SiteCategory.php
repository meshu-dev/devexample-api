<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteCategory extends Model
{
    protected $table = 'site_categories';
    protected $fillable = ['name'];
    
    public $timestamps = false;
}
