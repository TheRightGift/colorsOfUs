<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Shippinginfo extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['lastname', 'firstname', 'postal_code', 'state_id', 'town', 'country', 'phone', 'phone2', 'address', 'address2', 'lga_id', 'created_at', 'deleted_at', 'updated_at', 'primary', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class); //->withTrashed()
    }

    public function order() {
        return $this->hasMany(Order::class)->withTrashed();
    }

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function lga() {
        return $this->belongsTo(LocalGovernment::class);
    }
    

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
