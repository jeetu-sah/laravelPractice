<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Role extends Model {
    use SoftDeletes;
    protected $table = 'roles';
    protected $fillable = [
        'id',
        'slug_name',
        'name',
        'description',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function users() {
        return $this->belongsToMany( User::class, 'user_role',
        'roll_id',
        'user_id',
        );
    }
}
