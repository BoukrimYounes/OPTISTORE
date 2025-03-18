<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'quantity', 'description',
        'published', 'inStock', 'sold', 'price',
        'color', 'category_id', 'brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id');
    }
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

}
