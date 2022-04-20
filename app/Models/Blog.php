<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['title', 'body', 'postedBy', 'views', 'category_id', 'created_at', 'deleted_at', 'updated_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the blog's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
