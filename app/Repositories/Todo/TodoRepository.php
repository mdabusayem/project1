<?php

namespace App\Repositories\Todo;

use App\Models\Todo;
use App\Models\Task;
use App\Repositories\Todo\TodoRepositoryInterface;
use Auth;

class TodoRepository implements TodoRepositoryInterface
{
    public function all()
    {
        return Todo::latest()->where('user_id',Auth::user()->id)->paginate(5);
    }
    public function tasks($id)
    {
        return Task::where('todo_id',$id)->get();
    }
    public function create(array $Details)
    {
        //dd($Details + ['user_id' => Auth::user()->id]);
        return Todo::create($Details + ['user_id' => Auth::user()->id]);
    }
    public function updatetodo($todo, array $newDetails)
    {
        return $todo->update($newDetails);
    }
    public function deletetodo($todo)
    {
        //dd($todo);
        $todo->delete();
    }
}
