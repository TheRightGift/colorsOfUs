<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['name', 'desc', 'image', 'created_at', 'deleted_at', 'updated_at'];

    public function products(){
        return $this->belongsToMany(Product::class)->withTrashed();
    }

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function sizes() {
        return $this->belongsToMany(Size::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class);
    }

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
