<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['user_id', 'lastname', 'firstname', 'othername', 'lga', 'state', 'address', 'phone', 'phone2', 'username', 'profile_img', 'role_id' , 'created_at', 'deleted_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class); //->withTrashed()
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
