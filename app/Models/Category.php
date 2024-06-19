<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function subcategory(): HasMany
    {
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }
}
