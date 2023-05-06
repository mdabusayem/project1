<?php

namespace App\Repositories\Task;

interface TaskRepositoryInterface 
{
    public function get_todos_tasks($id);
    public function deleteTask($Task);
    public function create(array $Details);
    public function updateTask($Task, array $newDetails);
}