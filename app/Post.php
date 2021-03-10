<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 
        'title_slug',
        'title',
        'description',
        'deleted_at',
        'created_at',
        'updated_at'
    ];


    public function postComments()
    {
        return $this->hasMany('App\Comment','post_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
