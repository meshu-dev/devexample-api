<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmarks';
    protected $fillable = ['guest_user_id', 'bookmark_category_id', 'name', 'url'];

    public $timestamps = false;
}
