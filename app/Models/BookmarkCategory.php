<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookmarkCategory extends Model
{
    protected $table = 'bookmark_categories';
    protected $fillable = ['guest_user_id', 'name'];

    public $timestamps = false;
}
