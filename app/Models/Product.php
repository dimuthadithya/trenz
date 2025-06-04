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
            get: fn($value) => $value ? $value : null,
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
