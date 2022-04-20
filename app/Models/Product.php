<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['title', 'desc', 'amount', 'stock', 'recommended', 'created_at', 'deleted_at', 'updated_at'];

    public function products(){
        return $this->belongsToMany(Product::class)->withTrashed();
    }

    /**
     * Get all of the product's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function category_sizes() {
        return $this->belongsToMany(CategorySize::class);
    }

    public function category_colors() {
        return $this->belongsToMany(CategoryColor::class);
    }

    public function promotionals() {
        return $this->belongsToMany(Promotional::class);
    }

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
