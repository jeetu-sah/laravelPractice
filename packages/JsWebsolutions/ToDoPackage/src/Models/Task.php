<?php
namespace JsWebsolutions\ToDoPackage\Models;

use Illuminate\Database\Eloquent\Model;

/**
* Model of the table tasks.
*/
class Task extends Model
{
    protected $table = 'task';

    protected $fillable = [
        'employee_name',
        'task',
        'status',
        'created_at',
        'updated_at',
    ];
}