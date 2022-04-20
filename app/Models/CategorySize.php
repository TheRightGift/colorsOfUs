<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategorySize extends Pivot
{
    protected $fillable = ['category_id', 'size_id'];

    public function category_size_product() {
        return $this->belongsToMany(Product::class);
    }
}
