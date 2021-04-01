<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $table = 'comments';
    protected $fillable = [
            'post_id', 
            'description',
            'deleted_at',
            'created_at',
            'updated_at',
        ];


    public function post(){
        return $this->belongsTo('App\Post','post_id');
    }
}
