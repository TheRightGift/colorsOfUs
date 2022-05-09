<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Shippinginfo extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['lastname', 'firstname', 'postal_code', 'state', 'town', 'country', 'phone', 'phone2', 'address', 'address2', 'lga', 'created_at', 'deleted_at', 'updated_at'];

    public function users(){
        return $this->belongsToMany(User::class); //->withTrashed()
    }

    public function order() {
        return $this->hasMany(Order::class);
    }
    

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
