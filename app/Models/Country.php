<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = ['guest_user_id', 'continent_id', 'name'];

    public $timestamps = false;

    /**
     * Get the continent for the country.
     */
    /*
    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class);
    } */
}
