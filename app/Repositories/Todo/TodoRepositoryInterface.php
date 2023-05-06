<?php

namespace App\Repositories\Todo;

interface TodoRepositoryInterface 
{
    public function all();
    public function deletetodo($todo);
    public function tasks($id);
    public function create(array $Details);
    public function updatetodo($todo, array $newDetails);
}