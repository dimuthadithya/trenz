<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['image_path', 'image_name', 'image_type', 'product_id'];

    public function getImagePathAttribute($value)
    {
        if (empty($value)) return null;
        // Handle both old paths and new storage paths
        if (
            str_starts_with($value, 'http') ||
            str_starts_with($value, 'https') ||
            str_starts_with($value, '/storage') ||
            str_starts_with($value, 'storage')
        ) {
            return $value;
        }
        return 'storage/' . $value;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
