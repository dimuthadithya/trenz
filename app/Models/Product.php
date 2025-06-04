<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'category_id',
        'image'
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
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
            },
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleryImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
