<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    protected $table = 'images';
    protected $primaryKey = 'id';

    protected $fillable = ['imageable_id',
    'imageable_type',
    'name',
    'created_at',
    'updated_at'];

    public function imageable() {
        return $this->morphTo();
    }
}
