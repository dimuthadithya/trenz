<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['image_path', 'image_name', 'image_type', 'product_id'];

    public function getImagePathAttribute($value)
    {
        if (empty($value)) return null;
        return asset('storage/products/gallery/' . $value);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
