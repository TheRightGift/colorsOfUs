<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['user_id', 'username', 'firstname', 'lastname', 'gender', 'created_at', 'deleted_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
