<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';
    protected $fillable = ['site_category_id', 'url', 'image_url'];

    public $timestamps = false;
}
