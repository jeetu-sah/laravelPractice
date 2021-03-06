<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Role;

class User extends Authenticatable {
    use Notifiable;
    

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        return $this->hasMany( Post::class );
    }


    public function userComment()
    {
        return $this->hasOneThrough('App\Post', 'App\Comment');
    }



    
    public function userPostComment()
    {
        return $this->hasManyThrough('App\Comment',
                                     'App\Post',
                                     'user_id',
                                     'post_id',
                                    );
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_role',
        'user_id',
        'roll_id');
    }
}
