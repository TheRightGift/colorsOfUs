<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['url', 'imageable_id', 'imageable_type', 'created_at', 'deleted_at', 'updated_at'];

    /**
     * Get the parent imageable model (product or blog).
     */
    public function imageable()
    {
        return $this->morphTo();
    }

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
