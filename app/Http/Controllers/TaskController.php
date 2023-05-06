<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Task\TaskRepositoryInterface;

class TaskController extends Controller
{

    protected $Task;

    public function __construct(TaskRepositoryInterface $TaskRepository)
    {

        $this->Task = $TaskRepository;
    }

    /*public function index()
    {
        $Tasks =$this->Task->all();
    
        return view('tasks.index',compact('Tasks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }*/
    public function get_todos_tasks($id)
    {
        
        $Tasks =$this->Task->get_todos_tasks($id);
    
        return view('tasks.index',compact('Tasks','id'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function task_create($id)
    {

        return view('tasks.create',compact('id'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->Task->create($request->all());
        $id=$request->todo_id;
             

        return redirect()->route('tasks.get_todos_tasks',compact('id'))
                        ->with('success','Task created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $Task)
    {
        return view('tasks.show',compact('Task'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $Task)
    {
        return view('tasks.edit',compact('Task'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $Task)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $this->Task->updateTask($Task,$request->all());
        $id=$request->todo_id;
             

        return redirect()->route('tasks.get_todos_tasks',compact('id'))
                        ->with('success','Task updated successfull');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $Task)
    {

        $this->Task->deleteTask($Task);
    
        return redirect()->back()->with('success','Task deleted successfull');;
    }
}
