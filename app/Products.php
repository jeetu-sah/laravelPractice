<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = ['name',
    'description',
    'price',
    'deleted_at',
    'created_at',
    'updated_at'];

    public function image() {
        return $this->morphOne( Image::class, 'imageable' );
    }

    public function images() {
        return $this->morphMany( Image::class, 'imageable' );
    }

}
