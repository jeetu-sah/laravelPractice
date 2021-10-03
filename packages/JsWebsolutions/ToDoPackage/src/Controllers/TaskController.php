<?php

namespace JsWebsolutions\ToDoPackage\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JsWebsolutions\ToDoPackage\Contracts\TaskInterface;
use JsWebsolutions\ToDoPackage\Repository\TaskRepository;


class TaskController extends Controller
{

    protected $task = NULL;
    
    /**
     * Create a new constructor for this controller
     */
    public function __construct(TaskRepository $task)
    {
        $this->task = $task;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->task->allTask();
        return view('ToDoPackage::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'employee_name' => request()->employee_name,
            'task' => request()->task,
            'status' => 'active'
        ];
        $storeTasks = $this->task->create($data);
        if($storeTasks){
            return redirect()->back()->with(['status'=>'success' , 'msg'=>'Record save successfully.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
