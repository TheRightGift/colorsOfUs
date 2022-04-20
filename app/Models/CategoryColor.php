<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryColor extends Pivot
{
    protected $fillable = ['category_id', 'color_id'];

    public function category_color_product(){
        return $this->belongsToMany(Product::class);
    }
}
