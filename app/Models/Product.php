<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['title', 'desc', 'amount', 'stock', 'recommended', 'created_at', 'deleted_at', 'updated_at'];

    /**
     * Get all of the product's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function sizes() {
        return $this->belongsToMany(Size::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function promotionals() {
        return $this->belongsToMany(Promotional::class);
    }

    public function wishlists() {
        return $this->belongsToMany(Promotional::class);
    }

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
