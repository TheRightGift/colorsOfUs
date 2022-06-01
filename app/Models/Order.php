<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    // Status will be 
    // 0 for order in processing
    // 1 for order in transit
    // 2 for order completed, marked by user 

    protected $fillable = ['product_id', 'shippinginfo_id', 'color_id', 'size_id', 'discount', 'is_finished', 'is_customized', 'unit_price', 'quantity', 'status', 'orderID', 'deleted_at', 'created_at', 'updated_at'];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function shippinginfo() {
        return $this->belongsTo(Shippinginfo::class, 'shippinginfo_id');
    }

    public function admins() {
        return $this->belongsToMany(Admin::class);
    }

    public function size() {
        return $this->belongsTo(Size::class);
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }

    // public function notification() {
    //     return $this->hasOne(Notification::class);
    // }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
