<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ShippingInfo extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['lastname', 'firstname', 'othername', 'postal_code', 'state', 'town', 'country', 'phone', 'phone2', 'address', 'address2', 'lga', 'created_at', 'deleted_at', 'updated_at'];

    public function users(){
        return $this->belongsToMany(User::class)->withTrashed();
    }

    public function orders() {
        return $this->belongsTo(Order::class, 'order_id');
    }

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
