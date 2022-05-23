<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const DEFAULT_TYPE = 0;
    const ADMIN_TYPE = 1;
    const TECH_ADMIN_TYPE = 2;
    const SUPER_ADMIN_TYPE = 3;

    public function isAdmin() {        
        return $this->user_type == self::ADMIN_TYPE;    
    }

    public function isTechAdmin() {        
        return $this->user_type == self::TECH_ADMIN_TYPE;    
    }

    public function isSuperAdmin() {        
        return $this->user_type == self::SUPER_ADMIN_TYPE;    
    } 

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'user_type',
        'activation_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function shippinginfos(){
        return $this->belongsToMany(Shippinginfo::class)->withTrashed();
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
