<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['name', 'desc', 'created_at', 'deleted_at', 'updated_at'];

    public function categories(){
        return $this->belongsToMany(Category::class)->withTrashed();
    }

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
