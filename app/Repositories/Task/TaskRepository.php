<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\Task\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function get_todos_tasks($id)
    {
        return Task::latest()->where('todo_id',$id)->paginate(5);
    }
   
    
    public function create(array $Details)
    {
       //dd($Details);
        return Task::create($Details);
    }
    public function updateTask($Task, array $newDetails)
    {
        
        return $Task->update($newDetails);
    }
    public function deleteTask($Task)
    {
        //dd($Task);
        $Task->delete();
    }
}
