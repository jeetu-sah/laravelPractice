<?php
namespace JsWebsolutions\ToDoPackage\Contracts;

/**
* Interface EloquentRepositoryInterface
* @package App\Repositories
*/
interface TaskInterface
{
    public function allTask();

    public function create(array $data);
    
    public function getUserById($id);

    public function createOrUpdate(array $attributes);

    public function deleteUser($id);
 
 
}