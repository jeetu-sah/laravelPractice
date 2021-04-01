<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
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
