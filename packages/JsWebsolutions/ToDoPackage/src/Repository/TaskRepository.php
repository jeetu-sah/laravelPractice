<?php

namespace  JsWebsolutions\ToDoPackage\Repository;

use JsWebsolutions\ToDoPackage\Contracts\TaskInterface;
use JsWebsolutions\ToDoPackage\Models\Task;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;


class TaskRepository implements TaskInterface
{

    protected $model;

    /**
     * @param App $app
     * @throws \Bosnadev\Repositories\Exceptions\RepositoryException
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return '\JsWebsolutions\ToDoPackage\Models\Task';
    }

    public function allTask()
    {
        return $this->model->all();
    }

    public function getUserById($id)
    {
        return Task::find($id);
    }

    public function create(array $data)
    {
        // echo "<pre>";
        // print_r($data);exit;
        return $this->model->create($data);
    }

    public function createOrUpdate($id = null, $collection = [])
    {
        if (is_null($id)) {
            $user = new Task;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make('password');
            return $user->save();
        }
        $user = Task::find($id);
        $user->name = $collection['name'];
        $user->email = $collection['email'];
        return $user->save();
    }

    public function deleteUser($id)
    {
        return Task::find($id)->delete();
    }

    public function makeModel()
    {
        $this->model = $this->app->make($this->model());
        return $this->model;
    }
}
