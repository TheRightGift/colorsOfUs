<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotional extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['type', 'desc', 'discount', 'price', 'cover', 'created_at', 'deleted_at', 'updated_at'];

    public function products(){
        return $this->belongsToMany(Product::class)->withTrashed();
    }
    
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
