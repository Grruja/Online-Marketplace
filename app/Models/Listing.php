<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    protected $table = 'listings';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'condition',
        'price',
        'subcategory_id',
    ];

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }
}
