<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'parent_category_id'];

    // Parent Category Relationship
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    // Child Categories Relationship
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
}
