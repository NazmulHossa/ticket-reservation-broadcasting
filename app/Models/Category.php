<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Table name (optional if it matches 'categories')
    protected $table = 'categories';

    // Mass assignable fields
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    // Relationship: One category has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

